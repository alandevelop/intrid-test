<?php

namespace common\models;

use common\models\Product;

/**
 * This is the model class for table "offers".
 *
 * @property int $id
 * @property int $product_id
 * @property int $length
 * @property int $width
 * @property int $height
 * @property int $code
 * @property int $price
 *
 * @property Products $product
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'length', 'width', 'height', 'code', 'price'], 'required'],
            [['product_id', 'length', 'width', 'height', 'code', 'price'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'length' => 'Length',
            'width' => 'Width',
            'height' => 'Height',
            'code' => 'Code',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
