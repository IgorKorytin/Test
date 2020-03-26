<?php

namespace backend\controllers;

use app\models\Category;
use app\models\Item;
use app\models\ItemTags;
use app\models\Tags;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Item::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Item();
        $categories = Category::getList();
        $tags = Tags::getList();
        $request = Yii::$app->request;
        $item = $request->post('Item');
        if ($model->load($request->post()) && $model->save()) {
            if (isset($item['tags'])) {
                foreach ($item['tags'] as $key => $tag_id) {
                    $tag = Tags::findOne(array('id' => $tag_id));
                    $item_tag = new ItemTags();
                    $item_tag->item_id = $model->id;
                    $item_tag->tag_id = $tag->id;
                    $item_tag->tag = $tag->tag;
                    $item_tag->save(false);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_tags = $model->tags;
        $request = Yii::$app->request->post();
        $item = $request['Item']['tags'];

        $categories = Category::getList();
        $tags = Tags::getList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->setTags($item);
            $model->save(false);
            echo d($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
            'tags' => $tags,

        ]);
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
