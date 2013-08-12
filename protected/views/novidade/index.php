<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rafael Fonseca
 * Date: 27/07/13
 * Time: 15:05
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="page-header">
    <h1>Adicionar Novidade</h1>
</div>

<div class="row-fluid" style="">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'novidade-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'form-singin')
)); ?>

    <?php if (Yii::app()->user->hasFlash('success')) { ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php }
    if (Yii::app()->user->hasFlash('error')) {?>
        <div class="alert alert-error">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
    <?php } ?>

    <?php echo $form->errorSummary($model); ?>
    <fieldset>
        <label>Texto da novidade</label>
        <?php echo CHtml::activeTextArea($model,
        'texto',
        array('id' => 'nome',
            'required' => 'true',
            'class'=>'input-xxlarge'))?>

        <label>Data da novidade</label>
        <?php echo CHtml::activeDateField($model,
        'data_novidade',
        array('id' => 'dataNovidade',
            'required' => 'true',
            'class'=>'input-xxlarge'))?>

    </fieldset>
    <div class="clear"></div>
    <?php echo CHtml::submitButton('Adiconar', array('class'=>'btn btn-large')) ?>
    <?php $this->endWidget(); ?>
</div>
</div>