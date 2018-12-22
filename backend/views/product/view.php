<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view" style="margin-bottom: 50px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать продукт', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить продукт', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>

<div>
    <h2>Торговые предложения для данного товара</h2>

    <p>
        <a class="btn btn-success" href="<?php echo Url::to(['offer/create', 'product_id'=>$model->id]) ?>">Добавить торговое предложение</a>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'length',
            'width',
            'height',
            'code',
            'price',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model, $key) {
                        $product_id = $model->product_id;
                        $offer_id = $model->id;
                        return "<a href='".Url::to(['offer/update', 'id' =>$model->id, 'product_id'=>$model->product_id])."'>Update</a>";
                    },
                    'delete' => function($url, $model, $key) {
                        $product_id = $model->product_id;
                        $offer_id = $model->id;
                        return "<a 
                            href='".Url::to(['/offer/delete', 'id' =>$model->id, 'product_id'=>$model->product_id])."' 
                            data-method='post'
                            data-confirm='Are you sure you want to delete this item?'
                        >Delete</a>";
                    }
                ]
            ],
        ],
    ]); ?>
</div>
