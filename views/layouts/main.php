<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- <link rel = "stylesheet" type = "text/css" href = "<?php echo Url::to('@web/css/bootstrap.css');?>" /> -->
</head>
<style>

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    if(Yii::$app->user->can('admin')){
      NavBar::begin([
          'brandLabel' => "Admin DashBoard",
          'brandUrl' => array('/admin'),
          'options' => [
              'class' => 'navbar-inverse navbar-fixed-top',
          ],
      ]);
    }
    else if (Yii::$app->user->can('staff')){
      NavBar::begin([
          'brandLabel' => "Staff DashBoard",
          'brandUrl' => array('/staff'),
          'options' => [
              'class' => 'navbar-inverse navbar-fixed-top',
          ],
      ]);

    }
    else if(Yii::$app->user->can('student')){
      NavBar::begin([
          'brandLabel' => " Student DashBoard",
          'brandUrl' => array('/student'),
          'options' => [
              'class' => 'navbar-inverse navbar-fixed-top',
          ],
      ]);

    }else{
      NavBar::begin([
          'brandLabel' => "Amrita C S",
          'brandUrl' => array('/site/login'),
          'options' => [
              'class' => 'navbar-inverse navbar-fixed-top',
          ],
      ]);

    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? [] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Amrita C S <?= date('Y') ?></p>

        <p class="pull-right"><?php echo "Powered by TechWarriors" ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
