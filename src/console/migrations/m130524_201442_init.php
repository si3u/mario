<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(70)->notNull(),
            'email' => $this->string()->notNull()->unique(),

            'birthday' => $this->date(),
            'gender' => $this->smallInteger()->defaultValue(0),
            'cover' => $this->string(),
            'avatar' => $this->string(),
            'phone' => $this->string(15),
            'address' => $this->string(),
            'bio' => $this->text(),

            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),

            'role' => $this->string(50)->defaultValue(ROLE_MEMBER),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
