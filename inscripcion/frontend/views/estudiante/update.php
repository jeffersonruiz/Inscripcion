<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Estudiante */

$this->title = 'Update Estudiante: ' . $model->IdEstudiante;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdEstudiante, 'url' => ['view', 'id' => $model->IdEstudiante]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
