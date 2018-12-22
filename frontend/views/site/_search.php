<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OfferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-search">

    <?php $form = ActiveForm::begin([
        'action' => $action,
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id')->hiddenInput(['value'=> $product_id])->label(false) ?>

    <?= $form->field($model, 'length')->dropdownList($allLength, ['prompt'=>'Select']) ?>

    <?= $form->field($model, 'width')->dropdownList($allWidth,['disabled'=> true, 'prompt'=>'Select']) ?>

    <?= $form->field($model, 'height')->dropdownList($allHeight,['disabled'=> true, 'prompt'=>'Select']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
