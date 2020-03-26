<?php


/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $categories */
/* @var $tags */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Item',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'tags' => $tags,
    ]) ?>

</div>
