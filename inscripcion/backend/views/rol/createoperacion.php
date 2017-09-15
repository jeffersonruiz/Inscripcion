<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PrestamosGarantias */

$this->title = 'Registrar Operación';
$this->params['breadcrumbs'][] = ['label' => 'Operación', 'url' => ['indexoperacion', 'rol_id' => $rol_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-operacion-create">

    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    -->

    <?= $this->render('_formoperacion', [
        'model' => $model,
        'rol_id' => $rol_id,
    ]) ?>

</div>
