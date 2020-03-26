<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%item_tags}}".
 *
 * @property int $id
 * @property int $item_id
 * @property int $tag_id
 * @property string $tag
 *
 * @property Item $item
 * @property Tags $tag0
 */
class ItemTags extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%item_tags}}';
    }

    /**
     * {@inheritdoc}
     * @return ItemTagsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemTagsQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'tag_id'], 'integer'],
            [['tag'], 'required'],
            [['tag'], 'string', 'max' => 512],
            [
                ['item_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Item::className(),
                'targetAttribute' => ['item_id' => 'id']
            ],
            [
                ['tag_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Tags::className(),
                'targetAttribute' => ['tag_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'tag_id' => 'Tag ID',
            'tag' => 'Tag',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTag0()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }
}
