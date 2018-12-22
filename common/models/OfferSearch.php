<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * OfferSearch represents the model behind the search form of `frontend\models\Offer`.
 */
class OfferSearch extends Offer
{
    public static $dataProvider = null;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'length', 'width', 'height', 'code', 'price'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Offer::find()->with('product');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'product_id' => $this->product_id,
            'id' => $this->id,
        ]);

        return self::$dataProvider = $dataProvider;

    }

    public function getFormData()
    {
        return ArrayHelper::toArray(self::$dataProvider->getModels(), [
            'common\models\Offer' => [
                'length' => function ($model) {
                    return $model->length;
                },
                'width' => function ($model) {
                    return $model->width;
                },
                'height' => function ($model) {
                    return $model->height;
                },
            ],
        ]);
    }

    public function getAllWidth()
    {
        $allWidth = ArrayHelper::map($this->getFormData(), 'width', 'width');
        ksort($allWidth);
        return $allWidth;
    }

    public function getAllHeight()
    {
        $allHeight = ArrayHelper::map($this->getFormData(), 'height', 'height');
        ksort($allHeight);;
        return $allHeight;
    }

    public function getAllProductLength()
    {
        $allLength = Offer::find()->select(['length'])->distinct()->asArray()->all();
        $allLength = ArrayHelper::map($allLength, 'length', 'length');
        ksort($allLength);
        return $allLength;
    }

    public function getAllLengthByProductId($product_id)
    {
        $allLength = Offer::find()->select(['length'])->distinct()->where('product_id=:id', [':id' => $product_id])->asArray()->all();
        $allLength = ArrayHelper::map($allLength, 'length', 'length');
        ksort($allLength);
        return $allLength;
    }
}
