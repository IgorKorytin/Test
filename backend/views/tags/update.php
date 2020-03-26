<?php

/* @var $this yii\web\View */
/* @var $model app\models\Tags */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
        'modelClass' => 'Tags',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="tags-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
