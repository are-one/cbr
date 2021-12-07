<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Gejala */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gejalas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gejala-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gejala', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_gejala',
            'nama_gejala',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
