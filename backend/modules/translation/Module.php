<?php

namespace backend\modules\translation;

use yii\i18n\MissingTranslationEvent;

/**
 * translation module definition class
 */
class Module extends \yii\base\Module
{
    /** @inheritdoc */
    public $controllerNamespace = 'backend\modules\translation\controllers';

    /**
     * @param MissingTranslationEvent $event
     */
    public static function missingTranslation($event)
    {
        // do something with missing translation
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
