<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penyakit */

$this->title = $model->id_penyakit;
$this->params['breadcrumbs'][] = ['label' => 'Penyakits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penyakit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_penyakit' => $model->id_penyakit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_penyakit' => $model->id_penyakit], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_penyakit',
            'nama_penyakit',
            'jenis_penyakit',
            'penyebab:ntext',
            'solusi_penyakit:ntext',
        ],
    ]) ?>

</div>
