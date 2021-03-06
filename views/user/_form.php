<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
       <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

       <?= $form->field($model, 'password')->passwordInput() ?>

       <?= $form->field($model, 'rolename')->dropDownList(
            ['admin'=>'Admin','staff'=>'Staff','student' => 'Student']
          );
        ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
