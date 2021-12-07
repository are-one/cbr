<?php

namespace app\controllers;

use app\models\Gejala;
use app\models\search\Gejala as GejalaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GejalaController implements the CRUD actions for Gejala model.
 */
class GejalaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Gejala models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GejalaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gejala model.
     * @param string $id_gejala Id Gejala
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_gejala)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_gejala),
        ]);
    }

    /**
     * Creates a new Gejala model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gejala();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_gejala' => $model->id_gejala]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Gejala model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_gejala Id Gejala
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_gejala)
    {
        $model = $this->findModel($id_gejala);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_gejala' => $model->id_gejala]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Gejala model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_gejala Id Gejala
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_gejala)
    {
        $this->findModel($id_gejala)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gejala model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_gejala Id Gejala
     * @return Gejala the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_gejala)
    {
        if (($model = Gejala::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
