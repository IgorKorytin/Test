<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `item`.
 */
class m200324_070310_create_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512)->notNull()->notNull(),
            'description' => $this->text()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->defaultValue(new Expression('NOW()')),
            'category_id' => $this->integer()->notNull(),
            'category' => $this->string(512)->notNull(),
        ]);

        $this->createTable('{{%tags}}', [
            'id' => $this->primaryKey(),
            'tag' => $this->string(512)->notNull(),
        ]);

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(512)->notNull(),
        ]);

        $this->createTable('{{%item_tags}}', [
            'id' => $this->primaryKey(),
            'item_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
            'tag' => $this->string(512)->notNull(),
        ]);


        $this->addForeignKey('fk_item_tag', '{{%item_tags}}', 'item_id', '{{%item}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_tag', '{{%item_tags}}', 'tag_id', '{{%tags}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_item_tag', '{{%item_tags}}');
        $this->dropForeignKey('fk_tag', '{{%item_tags}}');
        $this->dropTable('{{%item}}');
        $this->dropTable('{{%tags}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%item_tags}}');

    }
}
