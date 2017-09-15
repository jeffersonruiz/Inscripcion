<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\PersonaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdPersona') ?>

    <?= $form->field($model, 'PrimerNombre') ?>

    <?= $form->field($model, 'SegundoNombre') ?>

    <?= $form->field($model, 'PrimerApellido') ?>

    <?= $form->field($model, 'SegundoApellido') ?>

    <?php // echo $form->field($model, 'IdDocumentoIdentidad') ?>

    <?php // echo $form->field($model, 'NumeroDocumento') ?>

    <?php // echo $form->field($model, 'IdSexo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
