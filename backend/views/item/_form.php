<?php

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $categories */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'quantity')->textInput() ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo Select2::widget([
        'name' => 'state_2',
        'value' => '',
        'data' => $categories,
        'options' => ['multiple' => false, 'placeholder' => 'Выберите категрию ...']
    ]); ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
