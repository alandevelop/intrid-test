<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = $product->name;
\yii\web\YiiAsset::register($this);

?>

<h1 style="margin-bottom: 50px;"><?= Html::encode($this->title) ?></h1>


<div class="col-md-3">
    <p>Другие торговые предложения для данного товара:</p>
    <?php echo $this->render('_search', [
        'model' => $searchModel,
        'allLength' => $allLength,
        'allWidth' => $allWidth,
        'allHeight' => $allHeight,
        'product_id' => $product->id,
        'action' => ['view'],
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
        ],
    ]); ?>
</div>







