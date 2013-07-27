<?php
/* @var $this EmpresaController */

?>
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/jquery-ui.min.css" />
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/mask.js" type="text/javascript"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyALPiNlx5KpzDb93X5ecFrbFIjpw0KZXn8&sensor=false"></script>

<div class="page-header">
    <h1>Empresa</h1>
</div>

<div class="row-fluid" style="">

    <?php if ($mensagem !== null) {?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><?php echo $mensagem; ?></p>
    </div>
    <?php }?>

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'usuario-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'form-singin')
)); ?>

    <?php echo $form->errorSummary($model); ?>
    <fieldset>
        <label>Nome da Empresa</label>
        <?php echo CHtml::activeTextField($model,
        'nome',
        array('id' => 'nome',
            'required' => 'true',
            'class'=>'input-xxlarge'))?>

        <label>CNPJ</label>
        <?php
        $this->widget('CMaskedTextField', array(
            'model' => $model,
            'attribute' => 'cnpj',
            'mask' => '99.999.999/9999-99',
            'htmlOptions' => array('size' => 60)
        ));
        ?>

        <label>Endereço</label>
        <?php echo CHtml::activeTextField($model,
        'endereco',
        array('id' => 'endereco',
            'required' => 'true',
            'class'=>'input-xxlarge'))?>
        <span class="help-inline">Digite junto o número do estabelecimento.</span>

        <label>Telefone de Contato</label>
        <?php echo CHtml::activeTextField($model,
        'telefone',
        array('id' => 'telefone',
            'required' => 'true',
            'size' => 60))?>

        <?php echo CHtml::activeHiddenField($model, 'latitude', array('id'=>'latitude')); ?>
        <?php echo CHtml::activeHiddenField($model, 'longitude', array('id'=>'longitude')); ?>

    </fieldset>
    <div class="clear"></div>
    <?php echo CHtml::submitButton('Registrar', array('class'=>'btn btn-large')) ?>
    <?php $this->endWidget(); ?>
</div>
</div>

<script>
    $(document).ready(function () {

        $("#telefone").mask("(99) 9999-9999");

        var geocoder = new google.maps.Geocoder();

        $("#endereco").autocomplete({
            source: function (request, response) {
                geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
                    response($.map(results, function (item) {
                        return {
                            label: item.formatted_address,
                            value: item.formatted_address,
                            latitude: item.geometry.location.lat(),
                            longitude: item.geometry.location.lng()
                        }
                    }));
                })
            },
            select: function (event, ui){
                console.log(ui);
                $("#endereco").val(ui.item.label);
                $("#latitude").val(ui.item.latitude);
                $("#longitude").val(ui.item.longitude);
            }
        });
    });
</script>