<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_category}}`.
 */
class m190611_102547_create_book_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_category}}', [
            'id' => $this->primaryKey(),
            'book_id'=>$this->integer(),
            'category_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_category}}');
    }
}
