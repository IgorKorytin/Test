<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%tags}}".
 *
 * @property int $id
 * @property string $tag
 *
 * @property ItemTags[] $itemTags
 */
class Tags extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tags}}';
    }

    /**
     * @return array
     */
    public static function getList()
    {
        $tags = self::find()->all();
        if ($tags) {
            foreach ($tags as $tag) {
                $data[$tag->id] = $tag->tag;
            }
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag'], 'required'],
            [['tag'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getItemTags()
    {
        return $this->hasMany(ItemTags::className(), ['tag_id' => 'id']);
    }
}
