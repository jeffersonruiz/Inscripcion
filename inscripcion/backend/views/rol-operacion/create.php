<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RolOperacion */

$this->title = 'Registrar Operación - Rol';
$this->params['breadcrumbs'][] = ['label' => 'Operación - Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-operacion-create">

    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
