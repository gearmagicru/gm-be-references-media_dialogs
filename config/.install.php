<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации установки расширения.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    'id'          => 'gm.be.references.media_dialogs',
    'moduleId'    => 'gm.be.references',
    'name'        => 'Media dialogs',
    'description' => 'Media selection dialogs',
    'namespace'   => 'Gm\Backend\References\MediaDialogs',
    'path'        => '/gm/gm.be.references.media_dialogs',
    'route'       => 'media-dialogs',
    'locales'     => ['ru_RU', 'en_GB'],
    'permissions' => ['any', 'view', 'read', 'info'],
    'events'      => [],
    'required'    => [
        ['php', 'version' => '8.2'],
        ['app', 'code' => 'GM MS'],
        ['app', 'code' => 'GM CMS'],
        ['app', 'code' => 'GM CRM'],
        ['module', 'id' => 'gm.be.references'],
        ['extension', 'id' => 'gm.be.references.media_folders'],
    ]
];
