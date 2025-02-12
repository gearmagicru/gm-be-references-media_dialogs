<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет русской локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Медиа диалоги',
    '{description}' => 'Диалоги выбора медиафайлов',
    '{permissions}' => [
        'any'  => ['Полный доступ', 'Просмотр и внесение изменение в диалоги'],
        'view' => ['Просмотр', 'Просмотр диалогов'],
        'read' => ['Чтение', 'Чтение диалогов']
    ],

    // Grid: контекстное меню записи
    'Edit record' => 'Редактировать',
    // Grid: столбцы
    'Name' => 'Название',
    'Alias' => 'Псевдоним',
    'Options' => 'Настройки',
    'Enabled' => 'Доступен',
    // Grid: всплывающие сообщения / заголовок
    'Enabled' => 'Доступен',
    'Disabled' => 'Не доступен',
    'Media dialog «{0}» - enabled' => 'Медиа диалог «{0}» - <b>доступен</b>.',
    'Media dialog «{0}» - disabled' => 'Медиа диалог «{0}» - <b>не доступен</b>.',

    // Form
    '{form.title}' => 'Добавление диалога',
    '{form.titleTpl}' => 'Изменение диалога "{name}"',
    // Form: вкладки
    'Common' => 'Общее',
    'View' => 'Вид',
    'Media folders' => 'Медиапапки',
    // Form:  вкладка "общее" / поля
    'Dialog folder' => 'Папка диалога',
    'Folder name' => 'Имя папки',
    'The name of the dialog folder that will be displayed in the root folder of the dialog folder tree panel' 
        => 'Имя папки диалога (основная папка выбора файла), которая будет отображаться в корневой папке панели дерева папок диалога',
    'Media folder' => 'Медиапапка',
    'The profile of the selected media folder will be used to load files, and its local path will be used to select the file' 
        => 'Профиль выбранной медиапапки будет использован для загрузки файлов, а её локальный путь - для выбора файла',
    'The dialog folder is the main folder for file selection' 
        => 'Папка диалога - это основная папка выбора файла. Если она не указана, выбор будет из доступных медиапапок.',
    'Selectable file / folder' => 'Выбераемый файл / папка',
    'Cut off the path' => 'Отсечь путь',
    'Cuts off part of the path from the selected file or folder when substituting it into the field' 
        => 'Отсекает часть пути у выбранного файла или папки при подстановке в поле. Если значение не указано, то будет '
        . 'отсекаться путь - путь к папке с общим доступом (например, "/public").',
    'Choose' => 'Выбрать',
    'Ability to select only specified elements (file/folder) of the dialog' 
        => 'Возможность выбора только указанных элементов (файла / папки) диалога',
    'All (file or folder)' => 'Всё (файл или папка)',
    'File' => 'Файл',
    'Folder' => 'Папка',
    'Label' => 'Метка',
    'File/folder selection field label name' => 'Название метки поля выбора файла / папки',
    // Form:  вкладка "вид" / поля
    'Dialog box element display options' => 'Параметры отображения элементов диалогового окна.',
    'Toolbar' => 'Панель инструментов ',
    'Folder tree panel' => 'Панель дерева папок',
    'show folder icons' => 'показывать значки папок',
    'show system folder icons' => 'показывать значки системных папок',
    'show toolbar' => 'показывать панель инструментов',
    'show root folder' => 'показывать корневую папку',
    'show panel' => 'показывать панель',
    'resize panel' => 'изменять размер панели',
    'show arrows' => 'показывать стрелочки',
    'sort folders' => 'сортировать папки',
    'number of folders to expand' => 'количество раскрываемых папок',
    'panel size' => 'размер панели, пкс',
    'Width of the folder tree panel in pixels' => 'Ширина панели дерева папок в пикселях',
    'panel position' => 'положение панели',
    'left' => 'слева',
    'right' => 'справа',
    'Files grid' => 'Сетка отображения файлов',
    'show only files' => 'показывать только файлы',
    'double click on folder/file' => 'двойной клик на папке / файле',
    'show lines between columns' => 'показывать линии между столбцами',
    'show lines between lines' => 'показывать линии между строками',
    'line alternation' => 'чередование строк',
    'show icons' => 'показывать значки',
    'show popup menus' => 'показывать всплывающие меню',
    "Show columns" => 'Показывать столбцы',
    'column "Size"' => 'столбец "Размер"',
    'column "Type"' => 'столбец "Тип"',
    'column "MIME"' => 'столбец "MIME-тип"',
    'column "Permissions"' => 'столбец "Права доступа"',
    'column "Access time"' => 'столбец "Последний доступ"',
    'column "Change time"' => 'столбец "Последнее обновление"',
    'number of files and folders per page' => 'количество элементов на странице',
    // Form:  вкладка "медиапапки" / поля
    'The selected media folders tree dialog box provides the ability to view and select files and folders of the appropriate type' 
        => 'Выбранные медиапапки дерева диалогового окна, предоставляют возможность просмотра, выбора файлов и папок соответствующего типа.',
    'The root element of the tree (the "Media files" folder) must be selected' 
        => '<br>Корневой элемент дерева (папка "Медиафайлы") должен быть обязательно выбран.',
    'To change the media folder tree, see the Media Folder Structure reference' 
        => '<br>Для изменения дерева медиапапок см. справочник <a href="#" onclick="Gm.getApp().widget.load(\'@backend/references/media-folders\')">"Структура медиапапок"</a>.',
];