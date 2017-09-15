<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Persona */

$this->title = 'Update Persona: ' . $model->IdPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdPersona, 'url' => ['view', 'id' => $model->IdPersona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
