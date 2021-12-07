<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gejala */

$this->title = $model->id_gejala;
$this->params['breadcrumbs'][] = ['label' => 'Gejalas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gejala-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_gejala' => $model->id_gejala], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_gejala' => $model->id_gejala], [
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
            'id_gejala',
            'nama_gejala',
        ],
    ]) ?>

</div>
