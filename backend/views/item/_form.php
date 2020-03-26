<?php

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $categories */
/* @var $tags */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'quantity')->textInput() ?>

    <?php echo $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => $categories,
        'options' => ['multiple' => false, 'placeholder' => 'Выберите категрию ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?php echo $form->field($model, 'tags')->widget(Select2::classname(), [
        'data' => $tags,
        'options' => ['multiple' => true, 'placeholder' => 'Выберите тэги ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
