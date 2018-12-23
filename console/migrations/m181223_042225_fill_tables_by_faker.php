<?php

use yii\db\Migration;
use common\models\Product;
use common\models\Offer;

/**
 * Class m181223_042225_fill_tables_by_faker
 */
class m181223_042225_fill_tables_by_faker extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i<=5; $i++) {

            $product = new Product();
            $product->name = $faker->sentence($nbWords = 3, $variableNbWords = false);
            $product->save();
            $product_id = $product->getPrimaryKey();

           for($j=0; $j<=5; $j++) {
               $offer = new Offer();
               $offer->product_id = $product_id;
               $offer->length = $faker->numberBetween($min = 1, $max = 5);
               $offer->width = $faker->numberBetween($min = 1, $max = 5);
               $offer->height = $faker->numberBetween($min = 1, $max = 5);
               $offer->code = $faker->randomNumber($nbDigits = 5, $strict = true);
               $offer->price = $faker->randomNumber($nbDigits = 3, $strict = true);
               $offer->save();
           }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181223_042225_fill_tables_by_faker cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181223_042225_fill_tables_by_faker cannot be reverted.\n";

        return false;
    }
    */
}
