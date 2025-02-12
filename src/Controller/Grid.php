<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\MediaDialogs\Controller;

use Gm\Panel\Controller\GridController;
use Gm\Backend\References\MediaDialogs\Widget\TabGrid;

/**
 *  Контроллер сетки медиа диалогов.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\MediaDialogs\Controller
 * @since 1.0
 */
class Grid extends GridController
{
    /**
     * {@inheritdoc}
     */
    public function createWidget(): TabGrid
    {
        return new TabGrid();
    }
}
