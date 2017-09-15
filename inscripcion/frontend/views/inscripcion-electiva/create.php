<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\InscripcionElectiva */

$this->title = 'Registrar Inscripcion';
$this->params['breadcrumbs'][] = ['label' => 'Inscripcion Electiva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-electiva-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
