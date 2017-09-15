<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\DocumentoIdentidad */

$this->title = 'Registrar Documento Identidad';
$this->params['breadcrumbs'][] = ['label' => 'Documento Identidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-identidad-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
