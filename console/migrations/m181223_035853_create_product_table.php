<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m181223_035853_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
