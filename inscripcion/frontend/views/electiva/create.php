<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Electiva */

$this->title = 'Resgistrar Electiva';
$this->params['breadcrumbs'][] = ['label' => 'Electivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electiva-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
