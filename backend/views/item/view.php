<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description:ntext',
            'category',
            'quantity',
            'created_at',
            'updated_at',
            array(
                'label' => 'Tags',
                'value' => function ($model) {
                    if ($model->itemTags) {
                        foreach ($model->itemTags as $tag) {
                            $tags[] = $tag->tag;
                        }
                        return implode(", ", $tags);
                    } else {
                        return 'не задано';
                    }

                }
            ),

        ],
    ]) ?>

</div>
