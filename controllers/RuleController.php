<?php

namespace app\controllers;

use app\models\Rule;
use app\models\search\Rule as RuleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RuleController implements the CRUD actions for Rule model.
 */
class RuleController extends Controller
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
     * Lists all Rule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RuleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rule model.
     * @param string $gejala_id Gejala ID
     * @param string $penyakit_id Penyakit ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($gejala_id, $penyakit_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($gejala_id, $penyakit_id),
        ]);
    }

    /**
     * Creates a new Rule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rule();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'gejala_id' => $model->gejala_id, 'penyakit_id' => $model->penyakit_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $gejala_id Gejala ID
     * @param string $penyakit_id Penyakit ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($gejala_id, $penyakit_id)
    {
        $model = $this->findModel($gejala_id, $penyakit_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'gejala_id' => $model->gejala_id, 'penyakit_id' => $model->penyakit_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $gejala_id Gejala ID
     * @param string $penyakit_id Penyakit ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($gejala_id, $penyakit_id)
    {
        $this->findModel($gejala_id, $penyakit_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $gejala_id Gejala ID
     * @param string $penyakit_id Penyakit ID
     * @return Rule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($gejala_id, $penyakit_id)
    {
        if (($model = Rule::findOne(['gejala_id' => $gejala_id, 'penyakit_id' => $penyakit_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
