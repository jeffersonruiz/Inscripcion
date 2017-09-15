<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\sidenav\SideNav;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use rmrevin\yii\fontawesome\FA;

use kartik\icons\Icon;
Icon::map($this);  

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
     
    <?php  
    NavBar::begin([
        'brandLabel' => 'My Company - Administración Sistema',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-custom navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Registrarse', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <br><br><br>
    
<div class="main">
  <div class="wrap">
    
    <div class="col-sm-3">
    
    <?php    
    
        $type = SideNav::TYPE_PRIMARY;
    
        echo SideNav::widget([
            'type' => $type,
            'encodeLabels' => false,
            'heading' => 'Menú Principal',
            'items' => [
                // Important: you need to specify url as 'controller/action',
                // not just as 'controller' even if default action is used.
                ['label' => FA::icon('home')->size(FA::SIZE_2X) . 'Home', 'url' => Url::to(['/site/index', 'type'=>$type]), 'active' => (false)],
                              
                ['label' => '<span class="pull-right badge">4</span> ' . FA::icon('lock')->size(FA::SIZE_2X) . ' Permisos', 'items' => [                    
                        ['label' => 'Usuario', 'url' => Url::to(['/user/index', 'type'=>$type]), 'active' => (false)],
                        ['label' => 'Rol Usuario', 'url' => Url::to(['/rol/index', 'type'=>$type]), 'active' => (false)],
                        ['label' => 'Menú Sistema', 'url' => Url::to(['/menu/index', 'type'=>$type]), 'active' => (false)],
                        ['label' => 'Operación Menú', 'url' => Url::to(['/operacion/index', 'type'=>$type]), 'active' => (false)],
                        ['label' => 'Operación Rol', 'url' => Url::to(['/rol-operacion/index', 'type'=>$type]), 'active' => (false)]
                    ],
                ],
             ],
        ]);    

    ?> 
    </div>
      <div class="col-sm-9">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
          
            <?= $content ?>
      </div>  
</div>
</div>        

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
