<?php
/* @var $this CadastroController */

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
                'id'=>'usuario-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
                'htmlOptions'=>array('class'=>'form-singin')
            )); ?>

                <h2>Cadastre-se</h2>

                <?php echo $form->errorSummary($model); ?>

                <?php echo CHtml::activeTextField($model,
                'nome',
                array('id' => 'nome',
                    'placeholder' => 'Seu Nome',
                    'required' => 'true',
                    'size' => 60,
                    'class'=>'input-block-level'))?>

                <?php echo CHtml::activeTextField($model,
                'email',
                array('id' => 'usuario',
                    'placeholder'=>'Seu Email',
                    'required'=>'true',
                    'size' => 60,
                    'class'=>'input-block-level'))?>

                <?php echo CHtml::activeTextField($model,
                'email',
                array('id' => 'usuario_repeat',
                    'placeholder'=>'Repita Seu Email',
                    'required'=>'true',
                    'size' => 60,
                    'class'=>'input-block-level'))?>

                <?php echo CHtml::activePasswordField($model,
                'senha',
                array('id' => 'senha',
                    'placeholder' => 'Nova Senha',
                    'required'=>'true',
                    'size' => 60,
                    'class'=>'input-block-level')) ?>

                <?php echo CHtml::submitButton('Registrar', array('class'=>'btn btn-large')) ?>
                <?php $this->endWidget(); ?>
        </div>
    </div>
</div>