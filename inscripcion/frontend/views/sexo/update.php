<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sexo */

$this->title = 'Actualizar Sexo: ' . ' ' . $model->IdSexo;
$this->params['breadcrumbs'][] = ['label' => 'Sexo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdSexo, 'url' => ['view', 'id' => $model->IdSexo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="sexos-update">

    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
