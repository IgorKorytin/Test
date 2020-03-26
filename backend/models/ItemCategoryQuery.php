<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ItemCategory]].
 *
 * @see ItemCategory
 */
class ItemCategoryQuery extends \yii\db\ActiveQuery
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
        if ($db === null)
            $db= \Yii::$app->db;
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ItemCategory|array|null
     */
    public function one($db = null)
    {
        if ($db === null)
            $db= \Yii::$app->db;
        return parent::one($db);
    }
}
