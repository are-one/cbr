<?php

namespace app\controllers;

use app\models\Penyakit;
use app\models\search\Penyakit as PenyakitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenyakitController implements the CRUD actions for Penyakit model.
 */
class PenyakitController extends Controller
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
     * Lists all Penyakit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenyakitSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penyakit model.
     * @param string $id_penyakit Id Penyakit
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_penyakit)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_penyakit),
        ]);
    }

    /**
     * Creates a new Penyakit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penyakit();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_penyakit' => $model->id_penyakit]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Penyakit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_penyakit Id Penyakit
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_penyakit)
    {
        $model = $this->findModel($id_penyakit);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_penyakit' => $model->id_penyakit]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Penyakit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_penyakit Id Penyakit
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_penyakit)
    {
        $this->findModel($id_penyakit)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Penyakit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_penyakit Id Penyakit
     * @return Penyakit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_penyakit)
    {
        if (($model = Penyakit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
