<?php


/* @var $this yii\web\View */
/* @var $model app\models\Tags */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Tags',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
