<?php
/**
 * Расширение модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\MediaDialogs;

/**
 * Расширение "Медиа диалоги".
 * 
 * Расширение принадлежит модулю "Справочники".
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\MediaDialogs
 * @since 1.0
 */
class Extension extends \Gm\Panel\Extension\Extension
{
    /**
     * {@inheritdoc}
     */
    public string $id = 'gm.be.references.media_dialogs';

    /**
     * {@inheritdoc}
     */
    public string $defaultController = 'grid';

    /**
     * Возвращает активную запись медиапапки.
     *
     * @return MediaFolder
     * 
     * @throws CreateObjectException
     */
    public function createMediaFolder(): MediaFolder
    {
        /** @var MediaFolder|null $model */
        $model = Gm::$app->extensions->getModel('MediaFolder', 'gm.be.references.media_folders');
        if ($model === null) {
            throw new CreateObjectException(
                Gm::t('app', 'Could not defined data model "{0}"', [MediaFolder::class])
            );
        }
        return $model;
    }
}