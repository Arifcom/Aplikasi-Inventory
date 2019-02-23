<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'YII Inventory';
?>
<div class="container">
    <div class="row">
        <br />
        <br />
        <br />
        <br />
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <?= Html::img('@web/files/images/logo.png', array('class' => 'profile-img', 'width' => '100', 'height' => '100')); ?>
                <h1 class="text-center login-title">YII Inventory</h1>
                <div class="form-signin">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <?= $form
                            ->field($model, 'username')
                            ->label(false)
                            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
                        <?= $form
                            ->field($model, 'password')
                            ->label(false)
                            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Login</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <a href="#" class="pull-right need-help">Forgot your account ?</a><span class="clearfix"></span>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <a href="#" class="text-center new-account">Don't have an account ?</a>
        </div>
    </div>
</div>