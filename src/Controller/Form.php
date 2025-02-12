<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\MediaDialogs\Controller;

use Gm;
use Gm\Panel\Controller\FormController;
use Gm\Backend\References\MediaDialogs\Widget\EditWindow;

/**
 * Контроллер формы профиля медиа диалога.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\MediaDialogs\Controller
 * @since 1.0
 */
class Form extends FormController
{

    /**
     * {@inheritdoc}
     */
    public function createWidget(): EditWindow
    {
        /** @var array $mediaFolders Медиапапки профиля медиа диалога */
        $mediaFolders = Gm::getEModel('MediaFolder', 'gm.be.references.media_folders')
            ->getTreeRows(function ($node, $level) {
                $icon = '<span class="gm-references-mediadialogs__folder ' 
                    . ($node['icon_cls'] ? $node['icon_cls'] : 'gm-references-mediafolders__folder') 
                    . '"></span> ';
            return [
                'xtype'      => 'checkbox',
                'ui'         => 'switch',
                'boxLabel'   => $icon . $node['name'],
                'style'      => 'padding-left:' . ($level * 20) . 'px',
                'name'       => 'folders[' . $node['id'] . ']',
                'inputValue' => 1
            ];
        });

        return new EditWindow([
            'mediaFolders' => $mediaFolders
        ]);
    }
}
