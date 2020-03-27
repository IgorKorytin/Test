<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $quantity
 * @property string $created_at
 * @property string $updated_at
 * @property int $category_id
 * @property string $category
 *
 * @property ItemTags[] $itemTags
 * @property array $tags
 */
class Item extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    public $_tags;

    /**
     * {@inheritdoc}
     * @return ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'quantity', 'category_id'], 'required', 'on' => 'insert'],
            [['description'], 'string'],
            [['quantity', 'category_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'category'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'quantity' => 'Quantity',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'category_id' => 'Category',
            'category' => 'Category',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getItemTags()
    {
        return $this->hasMany(ItemTags::className(), ['item_id' => 'id']);
    }

    /**
     * @return array
     */
    public function getTags()
    {
        if ($this->_tags === null) {
            $this->_tags = $this->getItemTags()->select('tag_id')->column();
        }
        return $this->_tags;
    }

    /**
     * @return array
     */
    public function setTags($tags)
    {
        if ($this->_tags === null) {
            $this->_tags = $this->tags;
        }
        return $this->_tags;
    }

    /**
     * @return boolean
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->isNewRecord) {
            $this->created_at = date('Y-m-d H:i:s');
        }
        $category = Category::findOne(array('id' => $this->category_id));
        $this->category = $category->category;
        $this->updated_at = date('Y-m-d H:i:s');
        return true;
    }


}
