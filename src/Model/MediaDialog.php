<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\MediaDialogs\Model;

use Gm;
use Gm\Helper\Json;
use Gm\Db\ActiveRecord;
use Gm\Stdlib\Collection;
use Gm\Helper\AdjacencyList;
use Gm\Uploader\PathTemplate;
use Gm\Backend\References\MediaFolders\Model\MediaFolder;

/**
 * Активная запись медиа диалога.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package  Gm\Backend\References\MediaDialogs\Model
 * @since 1.0
 */
class MediaDialog extends ActiveRecord
{
    use MediaDialogOptionsTrait;

    /**
     * {@inheritdoc}
     */
    public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * {@inheritdoc}
     */
    public function tableName(): string
    {
        return '{{reference_media_dialogs}}';
    }

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'id'           => 'id',
            'name'         => 'name', // название
            'alias'        => 'alias', // псевдоним
            'enabled'      => 'enabled', // доступность
            'folders'      => 'folders', // идент. доступных медиапапок
            'folderId'     => 'folder_id', // идент. медиапапки (папка диалога)
            'folderName'   => 'folder_name', // название папки диалога
            'browseLabel'  => 'browse_label', // метка поля
            'browseType'   => 'browse_type', // тип выберамего файла / папки
            'browseStripe' => 'browse_stripe', // убирать путь у выбранного файла / папки 
            'toolbar'      => 'toolbar', // панель инструментов диалога
            'options'      => 'options' // настройки диалога
        ];
    }

    /**
     * Возвращает медиа диалог по указанному псевдониму.
     * 
     * @see ActiveRecord::selectOne()
     * 
     * @param string $alias Псевдоним.
     * 
     * @return MediaDialog|null Активная запись при успешном запросе, иначе `null`.
     */
    public function getByAlias(string $alias): ?self
    {
        return $this->selectOne(['alias' => $alias]);
    }

    /**
     * Возвращает запись по указанному значению первичного ключа.
     * 
     * @see ActiveRecord::selectByPk()
     * 
     * @param mixed $id Идентификатор записи.
     * 
     * @return MediaDialog|null Активная запись при успешном запросе, иначе `null`.
     */
    public function get(mixed $identifier): ?self
    {
        return $this->selectByPk($identifier);
    }

    /**
     * Возращает значение для сохранения в поле "options".
     * 
     * @return string
     */
    public function unOptions(): string
    {
        /** @var null|string|array $options */
        $options = $this->options;
        if ($options) {
            return Json::encode($options);
        }
        return '';
    }

    /**
     * @var Collection
     */
    protected Collection $_options;

    /**
     * Возвращает параметры профиля медиапапки.
     * 
     * @return Collection
     */
    public function getOptions(): Collection
    {
        if (isset($this->_options)) {
            return $this->_options;
        }

        /** @var null|string|array $options */
        $options = $this->getAttribute('options') ?: [];
        if ($options) {
            if (is_string($options))
                $options = Json::decode($options, true);
            else
                $options = (array) $this->options;
            $options = $this->formatOptions($this->getOptionsFormat(), $options ?: []);
        }
        return $this->_options = Collection::createInstance($options);
    }

    /**
     * Возвращает CSS класс значка диалога.
     * 
     * CSS класс значка указывают медиапапке, которая является основной папкой диалога.
     * 
     * @return string Если CSS класс значка не указан, возвратит значение ''. 
     */
    public function getIcon(): string
    {
        /** @var MediaFolder|null $folder */
        $folder = $this->getMediaFolder();
        return $folder ? ($folder->iconCls ?: '') : '';
    }

    /**
     * @see MediaDialog::getMediaFolder()
     * 
     * @var MediaFolder
     */
    protected ?MediaFolder $mediaFolder;

    /**
     * Возврашает активную запись медиапапки.
     * 
     * @return MediaFolder|null
     */
    public function getMediaFolder(): ?MediaFolder
    {
        if (empty($this->folderId)) return $this->mediaFolder = null;

        if (!isset($this->mediaFolder)) {
            $this->mediaFolder = Gm::getEModel('MediaFolder', 'gm.be.references.media_folders')
                ->get($this->folderId);
        }
        return $this->mediaFolder;
    }

    /**
     * Возвращает (короткий) путь к вызываемой папке диалога.
     * 
     * Примеры возращаемого пути к вызываемой папке диалога:
     * - '2024/01/01/12345';
     * - 'public/uploads/i/2024/01/01/12345'.
     * 
     * @param array<string, mixed> $pathTemplateParams Параметры передаваемые в шаблон 
     *     создания пути к папке в виде пар "ключ - значение". {@see \Gm\Uploader\PathTemplate::$params}
     * @param bool $short Если значение `true`, то возвратит короткий путь, например 
     *     '2024/01/01/12345' (по умолчанию `true`).
     * 
     * @return string
     */
    public function getMediaPath(array $pathTemplateParams = [], bool $short = true): string
    {
        if (empty($this->folderId)) return '';
    
        /** @var MediaFolder|null $mediaFolder */
        $mediaFolder = $this->getMediaFolder();
        if ($mediaFolder) {
            $path = $mediaFolder->path;

            /** @var \Gm\Backend\References\FolderProfiles\Model\FolderProfile $folderProfile */
            $folderProfile = $mediaFolder->getFolderProfile();
            if ($folderProfile) {
                /** @var \Gm\Stdlib\Collection $folderOptions */
                $folderOptions = $folderProfile->getOptions();
                // если указан шаблон
                if ($folderOptions->pathTemplate) {
                    $pathTemplate = new PathTemplate($folderOptions->pathTemplate, $pathTemplateParams);
                    if ($short)
                        $path = $pathTemplate;
                    else
                        $path .=  '/' . $pathTemplate;
                }
            }
            return $path;
        }
        return '';
    }

    /**
     * Возвращает псевдонимы диалогов и соответствующие им пути к файлам.
     * 
     * Каждому псевдониму диалога соответствует путь, такой путь указывают медиапапке 
     * к которой привязан диалог. Если путь не указан или диалог не привязан к медиапапке,
     * то значение будет `null`.
     * 
     * Результат, например:
     * ```php
     * return [
     *     'article-image' => 'public/uploads/i',
     *     'profiles'      => null,
     *     // ...
     * ];
     * ```
     * 
     * @return array<string, string>
     */
    public function getAliasesWithPaths(): array
    {
        $result = [];

        /** @var \Gm\Backend\References\MediaFolders\Model\MediaFolder $folder */
        $folder = Gm::getEModel('MediaFolder', 'gm.be.references.media_folders');
        if ($folder) {
            /** @var array<int, array> $folders Медиапапки */
            $folders = $folder->fetchAll('id');
            /** @var array<int, array> $dialogs Диалоги */
            $dialogs = $this->fetchAll();
            foreach ($dialogs as $dialog) {
                $folderId = $dialog['folder_id'];
                if (isset($folders[$folderId]))
                    $result[$dialog['alias']] = $folders[$folderId]['path'] ?? null;
                else
                    $result[$dialog['alias']] = null;
            }
        }
        return $result;
    }

    /**
     * Возвращает вызываемую папку диалога в виде узла дерева медиапапок.
     * 
     * @param array<string, mixed> $dialogFolder Параметры вызываемой папки диалога. 
     *     Папка добавляется в дерево медиапапок диалога (по умолчанию `[]`).
     *     Может иметь параметры:
     *     - 'mediaPath', короткий путь к медиапапке, формируется из шаблона профиля 
     *     папки, например '2024/01/01/12345' (см. Справочники \ Профили медиапапок \ Загрузка).
     * 
     * @return array|null
     */
    public function getDialogFolder(array $dialogFolder): ?array
    {
        if (empty($this->folderId)) return null;
    
        /** @var MediaFolder|null $mediaFolder */
        $mediaFolder = $this->getMediaFolder();
        if ($mediaFolder) {
            /** @var string $mediaFolderPath Путь к медиапапке, например 'public/uploads/img' */
            $mediaFolderPath = $mediaFolder->path;
            /** @var string $mediaPath Короткий путь к медиапапке, например '2024/01/01/12345' */
            $mediaPath = $dialogFolder['mediaPath'] ?? '';
            if ($mediaPath) {
                $mediaFolderPath .= '/' . $mediaPath;
            }

            return [
                'id'      => $mediaFolderPath,
                'text'    => $this->folderName ?: $mediaFolder->name,
                'iconCls' => $mediaFolder->iconCls ?: null,
                'leaf'    => true,
                'isDialogFolder' => true // вызываемя папка диалога
            ];
        }
        return null;
    }

    /**
     * @see MediaDialog::getDialogFolderTree()
     * 
     * @var array
     */
    protected array $folderTree;

    /**
     * Возвращает дерево медиапапок диалога.
     * 
     * @param array<string, mixed> $dialogFolder Параметры вызываемой папки диалога. 
     *     Папка добавляется в дерево медиапапок диалога (по умолчанию `[]`).
     *     Может иметь параметры:
     *     - 'mediaPath', короткий путь к медиапапке, формируется из шаблона профиля 
     *     папки, например '2024/01/01/12345' (см. Справочники \ Профили медиапапок \ Загрузка).
     * 
     * @return array
     */
    public function getDialogFolderTree(array $dialogFolder = []): array
    {
        if (isset($this->folderTree)) {
            return  $this->folderTree;
        }

        // если в диалоге указаны идент. доступных медиапапок
        if ($this->folders) {
            /** @var array<string, string> $folders Медиапапки в виде узлов дерева */
            $folders = Gm::getEModel('MediaFolder', 'gm.be.references.media_folders')
                ->getNodes(['id' => explode(',', $this->folders), 'visible' => 1]);
            if ($folders) {
                AdjacencyList::setKeys([
                    'items'  => 'children',
                    'parent' => 'parentId'
                ]);
                /** @var array $folderTree Корневые узлы дерева  */
                $folderTree = AdjacencyList::getTree($folders, true, [
                    'id'      => 'id',
                    'text'    => 'text',
                    'leaf'    => 'leaf',
                    'iconCls' => 'iconCls'
                ]);
                $folderTree = $folderTree[0] ?? [];

                // если дерево имеет узлы
                if ($folderTree) {
                    // раскрываем 1-й узел дерева
                    $folderTree['expanded'] = true;
                    /** @var array|null $dialogFolder Вызываемая папка диалога */
                    $dialogFolder = $this->getDialogFolder($dialogFolder);
                    if ($dialogFolder) {
                        $folderTree['children'][] = $dialogFolder;
                    }
                }
                return $this->folderTree = $folderTree;
            }
        }
        return $this->folderTree = [];
    }

    /**
     * Возвращает дерево медиапапок диалога.
     * 
     * @param array<string, mixed> $dialogFolder Параметры вызываемой папки диалога. 
     *     Папка добавляется в дерево медиапапок диалога (по умолчанию `[]`).
     *     Может иметь параметры:
     *     - 'mediaPath', короткий путь к медиапапке, формируется из шаблона профиля 
     *     папки, например '2024/01/01/12345' (см. Справочники \ Профили медиапапок \ Загрузка).
     * 
     * @return array
     */
    public function getDialogFolderTreeRows(): array
    {
        // если в диалоге указаны идент. доступных медиапапок
        if ($this->folders) {
            /** @var array<string, string> $folders Медиапапки в виде узлов дерева */
            $folders = Gm::getEModel('MediaFolder', 'gm.be.references.media_folders')
                ->getNodes(['id' => explode(',', $this->folders), 'visible' => 1]);
            if ($folders) {
                AdjacencyList::setKeys([
                    'items'  => 'children',
                    'parent' => 'parentId'
                ]);
                /** @var array $folderTree Корневые узлы дерева  */
                $folderTree = AdjacencyList::getTree($folders, true, [
                    'id'      => 'id',
                    'text'    => 'text',
                    'leaf'    => 'leaf',
                    'iconCls' => 'iconCls'
                ]);
                $folderTree = $folderTree[0] ?? [];

                // если дерево имеет узлы
                if ($folderTree) {
                    // раскрываем 1-й узел дерева
                    $folderTree['expanded'] = true;
                    /** @var array|null $dialogFolder Вызываемая папка диалога */
                    $dialogFolder = $this->getDialogFolder($dialogFolder);
                    if ($dialogFolder) {
                        $folderTree['children'][] = $dialogFolder;
                    }
                }
                return $this->folderTree = $folderTree;
            }
        }
        return $this->folderTree = [];
    }
}
