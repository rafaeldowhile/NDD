<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael Fonseca
 * Date: 27/07/13
 * Time: 16:20
 * To change this template use File | Settings | File Templates.
 */
?>
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl?>/css/cadastro.css">
<div id="wrap">
    <div class="row-fluid">
        <div class="page-header">
            <h1><a class="well-large" href="<?php echo Yii::app()->baseUrl;?>/index.php">novidia</a> <small class="text-info">Novidades do dia dos melhores estabelecimentos!</small></h1>
        </div>
    </div>
    <div class="row-fluid" style="">
        <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array('class'=>'form-singin')
    )); ?>
        <?php if ($mensagem !== null) {?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p><?php echo $mensagem; ?></p>
        </div>
        <?php }?>

        <h2>Login</h2>

        <?php echo $form->errorSummary($model); ?>

        <?php echo CHtml::activeTextField($model,
        'username',
        array('id' => 'nome',
            'placeholder' => 'Email',
            'required' => 'true',
            'size' => 60,
            'class'=>'input-block-level'))?>

        <?php echo CHtml::activePasswordField($model,
        'password',
        array('id' => 'senha',
            'placeholder' => 'Senha',
            'required'=>'true',
            'size' => 60,
            'class'=>'input-block-level')) ?>

        <?php echo CHtml::submitButton('Login', array('class'=>'btn btn-large')) ?>
        <?php $this->endWidget(); ?>
    </div>
</div>