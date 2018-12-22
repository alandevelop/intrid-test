<?php

use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offers';
?>


<div class="offer-index">

    <div class="col-md-3">
        <?php echo $this->render('_search', [
            'model' => $searchModel,
            'allLength' => $allLength,
            'allWidth' => $allWidth,
            'allHeight' => $allHeight,
            'product_id' => '',
            'action' => ['index'],
        ]); ?>
    </div>

    <div class="col-md-9">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'class' => 'yii\grid\DataColumn',
                    'value' => function ($data) {
                        return $data->product->name;
                    },
                ],
                'length',
                'width',
                'height',
                'code',
                'price',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function($url, $model, $key) {
                            $product_id = $model->product_id;
                            $offer_id = $model->id;
                            return "<a href='".Url::to(['site/view', 'OfferSearch[id]' =>$offer_id, 'OfferSearch[product_id]'=>$product_id])."'>View</a>";
                        }
                    ]
                ],
            ],
        ]); ?>
    </div>


</div>
