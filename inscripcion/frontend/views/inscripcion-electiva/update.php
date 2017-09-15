<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\InscripcionElectiva */

$this->title = 'Actualizar Inscripcion: ' . $model->IdInscripcionElectiva;
$this->params['breadcrumbs'][] = ['label' => 'Inscripcion Electiva', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdInscripcionElectiva, 'url' => ['view', 'id' => $model->IdInscripcionElectiva]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inscripcion-electiva-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
