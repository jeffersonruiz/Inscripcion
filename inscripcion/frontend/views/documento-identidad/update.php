<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocumentoIdentidad */

$this->title = 'Actualizar Documento Identidad: ' . $model->IdDocumentoIdentidad;
$this->params['breadcrumbs'][] = ['label' => 'Documento Identidad', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->IdDocumentoIdentidad, 'url' => ['view', 'id' => $model->IdDocumentoIdentidad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="documento-identidad-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
