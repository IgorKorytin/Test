<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[ItemCategory]].
 *
 * @see ItemCategory
 */
class ItemCategoryQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ItemCategory[]|array
     */
    public function all($db = null)
    {
        if ($db === null) {
            $db = Yii::$app->db;
        }
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ItemCategory|array|null
     */
    public function one($db = null)
    {
        if ($db === null) {
            $db = Yii::$app->db;
        }
        return parent::one($db);
    }
}
