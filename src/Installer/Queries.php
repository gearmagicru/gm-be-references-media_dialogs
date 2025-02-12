<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации Карты SQL-запросов.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

use Gm\Helper\Json;

/** @var bool $isSetup Если установщик приложения  */
$isSetup = $this->getParam('isSetup', false);
/** @var bool $isRu Если язык установки русский */
$isRu = $this->getParam('isRu', false);
/** @var int|null $userId */
$userId = $isSetup ? 1 : Gm::userIdentity()->getId();
/** @var string $date */
$date = gmdate('Y-m-d H:i:s');

return [
    'drop'   => ['{{reference_media_dialogs}}'],
    'create' => [
        '{{reference_media_dialogs}}' => function () {
            return "CREATE TABLE `{{reference_media_dialogs}}` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `folder_id` int(11) unsigned DEFAULT NULL,
                `folder_name` varchar(255) DEFAULT NULL,
                `browse_label` varchar(255) DEFAULT NULL,
                `browse_type` varchar(100) DEFAULT '',
                `browse_stripe` varchar(255) DEFAULT '',
                `name` varchar(255) DEFAULT NULL,
                `alias` varchar(100) DEFAULT NULL,
                `folders` text DEFAULT NULL,
                `toolbar` text DEFAULT NULL,
                `options` text DEFAULT NULL,
                `enabled` tinyint(1) unsigned DEFAULT 1,
                `_updated_date` datetime DEFAULT NULL,
                `_updated_user` int(11) unsigned DEFAULT NULL,
                `_created_date` datetime DEFAULT NULL,
                `_created_user` int(11) unsigned DEFAULT NULL,
                `_lock` tinyint(1) unsigned DEFAULT 0,
                PRIMARY KEY (`id`)
            ) ENGINE={engine} 
            DEFAULT CHARSET={charset} COLLATE {collate}";
        }
    ],

    'insert' => [
        '{{reference_media_dialogs}}' => [
            [
                'id'            => 1,
                'name'          => $isRu ? 'Выбор изображения материала' : 'Selecting a material image',
                'alias'         => 'article-image',
                'browse_label'  => $isRu ? 'Файл изображения' : 'Image file', // метка поля
                'browse_type'   => 'file', // тип выберамего файла / папки
                'browse_stripe' => PUBLIC_BASE_URL, // убирать путь у выбранного файла / папки 
                'folders'       => '1,2,3', // Медиафайлы,Общие,Общие/Изображения
                'folder_id'     => 5, // идент. медиапапки (папка диалога)
                'folder_name'   => $isRu ? 'Изображения материала' : 'Images article',
                'toolbar'       => 'home,goup,-,creatFolder,delete,-,refresh,search,-,upload,-,rename,view,perms,attr,-,grid,list',
                'enabled'       => 1, // доступен
                'options'       => Json::encode([
                    'showTreeFolderIcons'   => 1, // показывать значки папок
                    'totalExpandedFolders'  => 100,// количество раскрываемых папок
                    'treeWidth'             => 300,// ширина панели дерева папок
                    'treePosition'          => 'left',// положение панели
                    'showTreeRoot'          => 1,// показывать корневую папку
                    'showTreeToolbar'       => 0, // показывать панель инструментов
                    'resizeTree'            => 1,// изменять размер панели
                    'useTreeArrows'         => 1,// показывать стрелочки
                    'showTree'              => 1,// показывать панель   
                    'dblClick'              => 1,// двойной клик на папке / файле
                    'stripeGridRows'        => 0, // чередование строк
                    'showGridColumnLines'   => 0,// показывать линии между столбцами
                    'showGridRowLines'      => 0, // показывать линии между строками
                    'showGridIcons'         => 1,// показывать значки
                    'showPopupMenu'         => 1,// показывать всплывающие меню
                    'gridPageSize'          => 100,// количество файлов и папок на странице
                    'showSizeColumn'        => 1,// показывать столбец "Размер"
                    'showTypeColumn'        => 1, // показывать столбец "Тип"
                    'showMimeTypeColumn'    => 1,// показывать столбец "MIME-тип"
                    'showPermissionsColumn' => 0,// показывать столбец "Права доступа"
                    'showAccessTimeColumn'  => 0,// показывать столбец "Последний доступ"
                    'showChangeTimeColumn'  => 0// показывать столбец "Последнее обновление"
                ]),
                '_created_date' => $date,
                '_created_user' => $userId
            ],
            [
                'id'            => 2,
                'name'          => $isRu ? 'Выбор документа материала' : 'Selecting a material document',
                'alias'         => 'article-doc',
                'browse_label'  => $isRu ? 'Файл документа' : 'Document file', // метка поля
                'browse_type'   => 'file', // тип выберамего файла / папки
                'browse_stripe' => PUBLIC_BASE_URL, // убирать путь у выбранного файла / папки 
                'folders'       => '1,2,4', // Медиафайлы,Общие,Общие/Изображения
                'folder_id'     => 8, // идент. медиапапки (папка диалога)
                'folder_name'   => $isRu ? 'Документы материала' : 'Documents article',
                'toolbar'       => 'home,goup,-,creatFolder,delete,-,refresh,search,-,upload,-,rename,view,perms,attr,-,grid,list',
                'enabled'       => 1, // доступен
                'options' => Json::encode([
                    'showTreeFolderIcons'   => 1, // показывать значки папок
                    'totalExpandedFolders'  => 100,// количество раскрываемых папок
                    'treeWidth'             => 300,// ширина панели дерева папок
                    'treePosition'          => 'left',// положение панели
                    'showTreeRoot'          => 1,// показывать корневую папку
                    'showTreeToolbar'       => 0, // показывать панель инструментов
                    'resizeTree'            => 1,// изменять размер панели
                    'useTreeArrows'         => 1,// показывать стрелочки
                    'showTree'              => 1,// показывать панель   
                    'dblClick'              => 1,// двойной клик на папке / файле
                    'stripeGridRows'        => 0, // чередование строк
                    'showGridColumnLines'   => 0,// показывать линии между столбцами
                    'showGridRowLines'      => 0, // показывать линии между строками
                    'showGridIcons'         => 1,// показывать значки
                    'showPopupMenu'         => 1,// показывать всплывающие меню
                    'gridPageSize'          => 100,// количество файлов и папок на странице
                    'showSizeColumn'        => 1,// показывать столбец "Размер"
                    'showTypeColumn'        => 1, // показывать столбец "Тип"
                    'showMimeTypeColumn'    => 1,// показывать столбец "MIME-тип"
                    'showPermissionsColumn' => 0,// показывать столбец "Права доступа"
                    'showAccessTimeColumn'  => 0,// показывать столбец "Последний доступ"
                    'showChangeTimeColumn'  => 0// показывать столбец "Последнее обновление"
                ]),
                '_created_date' => $date,
                '_created_user' => $userId
            ],
            [
                'id'            => 3,
                'name'          => $isRu ? 'Выбор изображения' : 'Selecting a image',
                'alias'         => 'image',
                'browse_label'  => $isRu ? 'Файл изображения' : 'Image file', // метка поля
                'browse_type'   => 'file', // тип выберамего файла / папки
                'browse_stripe' => PUBLIC_BASE_URL, // убирать путь у выбранного файла / папки 
                'folders'       => '1,2,3', // Медиафайлы,Общие,Общие/Изображения
                'folder_id'     => null, // идент. медиапапки (папка диалога)
                'folder_name'   => '',
                'toolbar'       => 'home,goup,-,creatFolder,delete,-,refresh,search,-,upload,-,rename,view,perms,attr,-,grid,list',
                'enabled'       => 1, // доступен
                'options'       => Json::encode([
                    'showTreeFolderIcons'   => 1, // показывать значки папок
                    'totalExpandedFolders'  => 100,// количество раскрываемых папок
                    'treeWidth'             => 300,// ширина панели дерева папок
                    'treePosition'          => 'left',// положение панели
                    'showTreeRoot'          => 1,// показывать корневую папку
                    'showTreeToolbar'       => 0, // показывать панель инструментов
                    'resizeTree'            => 1,// изменять размер панели
                    'useTreeArrows'         => 1,// показывать стрелочки
                    'showTree'              => 1,// показывать панель   
                    'dblClick'              => 1,// двойной клик на папке / файле
                    'stripeGridRows'        => 0, // чередование строк
                    'showGridColumnLines'   => 0,// показывать линии между столбцами
                    'showGridRowLines'      => 0, // показывать линии между строками
                    'showGridIcons'         => 1,// показывать значки
                    'showPopupMenu'         => 1,// показывать всплывающие меню
                    'gridPageSize'          => 100,// количество файлов и папок на странице
                    'showSizeColumn'        => 1,// показывать столбец "Размер"
                    'showTypeColumn'        => 1, // показывать столбец "Тип"
                    'showMimeTypeColumn'    => 1,// показывать столбец "MIME-тип"
                    'showPermissionsColumn' => 0,// показывать столбец "Права доступа"
                    'showAccessTimeColumn'  => 0,// показывать столбец "Последний доступ"
                    'showChangeTimeColumn'  => 0// показывать столбец "Последнее обновление"
                ]),
                '_created_date' => $date,
                '_created_user' => $userId
            ]
        ]
    ],

    'run' => [
        'install'   => ['drop', 'create', 'insert'],
        'uninstall' => ['drop']
    ]
];