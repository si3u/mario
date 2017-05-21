<?php

use yii\db\Migration;

/**
 * Handles the creation of table `seo`.
 */
class m170521_203727_create_seo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('seo', [
            'id' => $this->primaryKey(),
            'page' => $this->string(50)->unique(),
            'meta_title' => $this->string('70'),
            'meta_desc' => $this->string('160'),
            'meta_keyword' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('seo');
    }
}
