<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RolOperacion */

$this->title = 'Actualizar Operación - Rol: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Operación - Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="rol-operacion-update">

    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
