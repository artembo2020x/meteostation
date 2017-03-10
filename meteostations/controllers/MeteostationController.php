<?php

namespace app\controllers;

use Yii;
use app\models\Meteostation;
use app\models\SearchMeteostation;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MeteoStationController implements the CRUD actions for Meteostation model.
 */
class MeteostationController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Meteostation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMeteostation();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Meteostation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionTest() {
        echo 'poiopopi';
        die;
        return $this->render('test');
    }
    /**
     * Creates a new Meteostation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Meteostation();
        if(!isset(Yii::$app->request->post()['Meteostation'])) {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        $model->attributes=Yii::$app->request->post()['Meteostation'];
        if ($model->validate() && $model->save()) {
            return $this->redirect(['view', 'id' => $model->meteoId]);
        }
        else {
            Yii::$app->setFlash("error","Не удалось добавить станцию. Повторите попытку еще раз");
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Meteostation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if(!isset(Yii::$app->request->post()['Meteostation'])) {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        $model->attributes=Yii::$app->request->post()['Meteostation'];
        if ($model->validate() && $model->save()) {
            return $this->redirect(['view', 'id' => $model->meteoId]);
        }
        else {
            Yii::$app->setFlash("error","Не удалось добавить станцию. Повторите попытку еще раз");
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
       
    }

    /**
     * Deletes an existing Meteostation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    /**
     * Finds the Meteostation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Meteostation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Meteostation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
