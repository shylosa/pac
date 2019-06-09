<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m190606_185836_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surename' => $this->string(),
            'patronimic' => $this->string(),
            'date_birth' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
