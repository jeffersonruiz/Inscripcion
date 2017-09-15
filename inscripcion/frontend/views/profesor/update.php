<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profesor */

$this->title = 'Update Profesor: ' . $model->IdProfesor;
$this->params['breadcrumbs'][] = ['label' => 'Profesors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdProfesor, 'url' => ['view', 'id' => $model->IdProfesor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profesor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
