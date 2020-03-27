<?php

use backend\models\search\ItemSearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel  ItemSearch */

$this->title = Yii::t('backend', 'Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">


    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
            'modelClass' => 'Item',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'quantity',
            'category',
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
//            [
//                'attribute' => 'tags',
//                'label' => 'Tags',
//                'filter' => Select2::widget([
//
////                    'name' => 'tags',
//                    'data' => Tags::getList(),
//                    'value' => function ($model) {
//                    if ($model->itemTags) {
//                        foreach ($model->itemTags as $tag) {
//                            $tags[] = $tag->tag;
//                        }
//                        return implode(", ", $tags);
//                    } else {
//                        return 'не задано';
//                    }
//
//                },
//                    'options' => [
//                        'class' => 'form-control',
//                        'placeholder' => 'Выберите значение'
//                    ],
//                    'pluginOptions' => [
//                        'allowClear' => true,
//                        'selectOnClose' => true,
//                    ]
//                ])
//
//            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
