<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Sexo */

$this->title = 'Registrar Sexo';
$this->params['breadcrumbs'][] = ['label' => 'Sexo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sexo-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
