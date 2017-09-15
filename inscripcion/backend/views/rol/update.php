<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rol */

$this->title = 'Actualizar Rol: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="rol-update">

    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
