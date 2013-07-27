<?php
/* @var $this EmpresaController */

?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyALPiNlx5KpzDb93X5ecFrbFIjpw0KZXn8&sensor=false"></script>

<h1>Admin</h1>

<div class="row-fluid" style="">
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
        'size' => 60))?>

    <label>CNPJ</label>
    <?php echo CHtml::activeTextField($model,
    'nome',
    array('id' => 'nome',
        'required' => 'true',
        'size' => 60))?>

    <label>Endereço</label>
    <?php echo CHtml::activeTextField($model,
    'nome',
    array('id' => 'endereco',
        'required' => 'true',
        'size' => 120))?>
    <span class="help-block">Digíte junto o número do estabelecimento.</span>

    <label>Telefone de Contato</label>
    <?php echo CHtml::activeTextField($model,
    'nome',
    array('id' => 'nome',
        'required' => 'true',
        'size' => 60))?>

    <label>Categoria</label>
    <?php echo CHtml::activeDropDownList($model,
    'nome',
    array('1' => 'Restaurante',
          '2' => 'Bar'))?>

    </fieldset>
    <div class="clear"></div>
    <?php echo CHtml::submitButton('Registrar', array('class'=>'btn btn-large')) ?>
    <?php $this->endWidget(); ?>
</div>
</div>

<script>
    $(document).ready(function () {

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
            }
        });
    });
</script>