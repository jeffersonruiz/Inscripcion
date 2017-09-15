<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\InscripcionElectivaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripcion-electiva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdInscripcionElectiva') ?>

    <?= $form->field($model, 'IdEstudiante') ?>

    <?= $form->field($model, 'IdElectiva') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
