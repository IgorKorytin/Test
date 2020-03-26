<?php

/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $categories */
/* @var $tags */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
        'modelClass' => 'Item',
    ]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="item-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'tags' => $tags,
    ]) ?>

</div>
