<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profesor */

$this->title = $model->IdProfesor;
$this->params['breadcrumbs'][] = ['label' => 'Profesors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdProfesor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdProfesor], [
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
            'IdProfesor',
            'IdPersona',
        ],
    ]) ?>

</div>
