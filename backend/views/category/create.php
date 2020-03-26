<?php


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
