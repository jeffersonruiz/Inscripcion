<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Electiva */

$this->title = 'Update Electiva: ' . $model->IdElectiva;
$this->params['breadcrumbs'][] = ['label' => 'Electivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdElectiva, 'url' => ['view', 'id' => $model->IdElectiva]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="electiva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
