<?php

use yii\db\Migration;

/**
 * Handles the creation of table `offers`.
 */
class m181223_040753_create_offers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('offers', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'length' => $this->integer(1)->notNull(),
            'width' => $this->integer(1)->notNull(),
            'height' => $this->integer(1)->notNull(),
            'code' => $this->integer(11)->notNull(),
            'price' => $this->integer(11)->notNull(),
        ]);

        $this->createIndex(
            'idx-offers-product_id',
            'offers',
            'product_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-offers-product_id',
            'offers',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('offers');
    }
}
