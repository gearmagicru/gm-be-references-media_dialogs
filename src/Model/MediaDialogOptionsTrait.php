<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\MediaDialogs\Model;

/**
 * Трейт формата параметров медиа диалога.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\MediaDialogs\Model
 * @since 1.0
 */
trait MediaDialogOptionsTrait
{
    /**
     * Возвращает формат параметров.
     * 
     * @return array
     */
    protected function getOptionsFormat(): array
    {
        return  [
            // панель дерева папок
            ['showTreeFolderIcons', 'type' => 'int', 'default' => 0], // показывать значки папок
            ['totalExpandedFolders', 'type' => 'int', 'default' => 100], // количество раскрываемых папок
            ['treeWidth', 'type' => 'int', 'default' => 300], // размер панели
            ['treePosition', 'type' => 'string', 'default' => 'left'], // положение панели
            ['showTreeRoot', 'type' => 'int', 'default' => 0], // показывать корневую папку
            ['resizeTree', 'type' => 'int', 'default' => 0], // изменять размер панели
            ['useTreeArrows', 'type' => 'int', 'default' => 0], // показывать стерлочки
            ['sortTreeFolders', 'type' => 'int', 'default' => 0], // сортировать папки
            ['showTree', 'type' => 'int', 'default' => 0], // показывать панель
            // сетка отображения файлов
            ['dblClick', 'type' => 'int', 'default' => 1], // двойной клик на папке / файле
            ['showGridColumnLines', 'type' => 'int', 'default' => 0], // показывать линии между столбцами
            ['showGridRowLines', 'type' => 'int', 'default' => 0], // показывать линии между строками
            ['stripeGridRows', 'type' => 'int', 'default' => 0], // чередование строк
            ['showGridIcons', 'type' => 'int', 'default' => 0], // показывать значки
            ['showPopupMenu', 'type' => 'int', 'default' => 0], // показывать всплывающие меню
            ['gridPageSize', 'type' => 'int', 'default' => 1000], // количество элементов на странице
            // показывать столбцы
            ['showSizeColumn', 'type' => 'int', 'default' => 0], // столбец "размер"
            ['showTypeColumn', 'type' => 'int', 'default' => 0], // столбец "тип"
            ['showMimeTypeColumn', 'type' => 'int', 'default' => 0], // столбец "mime-тип"
            ['showPermissionsColumn', 'type' => 'int', 'default' => 0], // столбец "права доступа"
            ['showAccessTimeColumn', 'type' => 'int', 'default' => 0], // столбец "последний доступ"
            ['showChangeTimeColumn', 'type' => 'int', 'default' => 0], // столбец "последнее обновление"
        ];
    }

    /**
     * Выполняет форматирование значений параметров в указанном формате.
     * 
     * @param array $format Формат параметров.
     * @param array $options Параметры в виде пар "ключ - значение".
     * 
     * @return array
     */
    protected function formatOptions(array $format, array $options): array
    {
        $result = [];
        foreach ($format as $param) {
            $name = $param[0];
            if (isset($options[$name])) {
                $value = $options[$name];
                $type  = $param['type'];
                settype($value, $type);
                $result[$name] = $value;
            } else
                $result[$name] = $param['default'];
        }
        return $result;
    }
}
