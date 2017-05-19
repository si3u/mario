<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m170519_112828_create_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'image' => $this->string(),
            'content' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'published' => $this->smallInteger()->defaultValue(STATUS_ACTIVE),
            'layout' => $this->string(50)->notNull()->defaultValue('view'),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('page');
    }
}
