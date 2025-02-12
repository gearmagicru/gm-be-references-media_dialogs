<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет английской (британской) локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Media dialogs',
    '{description}' => 'Media selection dialogs',
    '{permissions}' => [
        'any'  => ['Full access', 'Viewing and making changes to dialogs'],
        'view' => ['View', 'Viewing dialogs'],
        'read' => ['Read', 'Reading dialogs']
    ],

    // Grid: контекстное меню записи
    'Edit record' => 'Edit record',
    // Grid: столбцы
    'Name' => 'Name',
    'Alias' => 'Alias',
    // Grid: всплывающие сообщения / заголовок
    'Enabled' => 'Enabled',
    'Disabled' => 'Disabled',
    'Media dialog «{0}» - enabled' => 'Media dialog «{0}» - <b>enabled</b>.',
    'Media dialog «{0}» - disabled' => 'Media dialog «{0}» - <b>disabled</b>.',

    // Form
    '{form.title}' => 'Add dialog',
    '{form.titleTpl}' => 'Edit dialog "{name}"',
    // Form: вкладки
    'Common' => 'Common',
    'View' => 'View',
    'Media folders' => 'Media folders',
    // Form:  вкладка "общее" / поля
    'Dialog folder' => 'Dialog folder',
    'Folder name' => 'Folder nam',
    'The name of the dialog folder that will be displayed in the root folder of the dialog folder tree panel' 
        => 'The name of the dialog folder that will be displayed in the root folder of the dialog folder tree panel',
    'Media folder' => 'Media folder',
    'The profile of the selected media folder will be used to load files, and its local path will be used to select the file' 
        => 'The profile of the selected media folder will be used to load files, and its local path will be used to select the file',
    'The dialog folder is the main folder for file selection' 
        => 'Dialog folder is the main file selection folder. If it is not specified, the selection will be from available media folders.',
    'Selectable file / folder' => 'Selectable file / folder',
    'Cut off the path' => 'Cut off the path',
    'Cuts off part of the path from the selected file or folder when substituting it into the field' 
        => 'Cuts off part of the path from the selected file or folder when substituting it into the field '
        . 'cut path - path to shared folder (e.g. "/public").',
    'Choose' => 'Choose',
    'Ability to select only specified elements (file/folder) of the dialog' 
        => 'Ability to select only specified elements (file/folder) of the dialog',
    'All (file or folder)' => 'All (file or folder)',
    'File' => 'File',
    'Folder' => 'Folder',
    'Label' => 'Label',
    'File/folder selection field label name' => 'File/folder selection field label name',
    // Form:  вкладка "вид" / поля
    'Dialog box element display options' => 'Dialog box element display options.',
    'Toolbar' => 'Toolbar ',
    'Folder tree panel' => 'Folder tree panel',
    'show folder icons' => 'show folder icons',
    'show system folder icons' => 'show system folder icons',
    'show toolbar' => 'show toolbar',
    'show root folder' => 'show root folder',
    'show panel' => 'show panel',
    'resize panel' => 'resize panel',
    'show arrows' => 'show arrows',
    'sort folders' => 'sort folders',
    'number of folders to expand' => 'number of folders to expand',
    'panel size' => 'panel size, px',
    'Width of the folder tree panel in pixels' => 'Width of the folder tree panel in pixels',
    'panel position' => 'panel position',
    'left' => 'left',
    'right' => 'right',
    'Files grid' => 'Files grid',
    'show only files' => 'show only files',
    'double click on folder/file' => 'double click on folder/file',
    'show lines between columns' => 'show lines between columns',
    'show lines between lines' => 'show lines between lines',
    'line alternation' => 'line alternation',
    'show icons' => 'show icons',
    'show popup menus' => 'show popup menus',
    "Show columns" => 'Show columns',
    'column "Size"' => 'column "Size"',
    'column "Type"' => 'column "Type"',
    'column "MIME"' => 'column "MIME"',
    'column "Permissions"' => 'column "Permissions"',
    'column "Access time"' => 'column "Access time"',
    'column "Change time"' => 'column "Change time"',
    'number of files and folders per page' => 'number of files and folders per page',
    // Form:  вкладка "медиапапки" / поля
    'The selected media folders tree dialog box provides the ability to view and select files and folders of the appropriate type' 
        => 'The selected media folders tree dialog box provides the ability to view and select files and folders of the appropriate type.',
    'The root element of the tree (the "Media files" folder) must be selected' 
        => '<br>The root element of the tree (the "Media files" folder) must be selected.',
    'To change the media folder tree, see the Media Folder Structure reference' 
        => '<br>To change the media folder tree, see the a href="#" onclick="Gm.getApp().widget.load(\'@backend/references/media-folders\')">"Media Folder Structure"</a> reference.',
];