<?php

use yii\db\Migration;

/**
 * Handles adding category_id to table `{{%book}}`.
 */
class m190610_183738_add_category_id_column_to_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('book', 'category_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('book', 'category_id');
    }
}
