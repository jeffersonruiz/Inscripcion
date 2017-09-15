<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\ElectivaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="electiva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdElectiva') ?>

    <?= $form->field($model, 'NombreElectiva') ?>

    <?= $form->field($model, 'IdProfesor') ?>

    <?= $form->field($model, 'descripción') ?>

    <?= $form->field($model, 'NumeroCupones') ?>

    <?php // echo $form->field($model, 'UsuarioGraba') ?>

    <?php // echo $form->field($model, 'FechaGraba') ?>

    <?php // echo $form->field($model, 'UsuarioModifica') ?>

    <?php // echo $form->field($model, 'FechaModifica') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
