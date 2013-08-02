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

        <label>EndereÃ§o</label>
        <?php echo CHtml::activeTextField($model,
        'endereco',
        array('id' => 'endereco',
            'required' => 'true',
            'class'=>'input-xxlarge'))?>
        <span class="help-inline">Digite junto o nÃºmero do estabelecimento.</span>

        <label>Telefone de Contato</label>
        <?php echo CHtml::activeTextField($model,
        'telefone',
        array('id' => 'telefone',
            'required' => 'true',
            'size' => 60))?>



        <label>Categorias</label>
        <div class="input-append">
            <input id="categoria" class="span12" id="teste" type="text"/>
            <button class="btn" type="button"><i class="icon-plus"></i></button>
        </div>

        <div id="listaCategorias">
        </div>

        <input type="hidden" id="Size_categoria" value="<?php echo count($model->categorias)?>"/>
        <?php echo CHtml::activeHiddenField($model, 'latitude', array('id'=>'latitude')); ?>
        <?php echo CHtml::activeHiddenField($model, 'longitude', array('id'=>'longitude')); ?>

    </fieldset>
    <div class="clear"></div>
    <?php echo CHtml::submitButton('Registrar', array('class'=>'btn btn-large')) ?>
    <?php $this->endWidget(); ?>
</div>
</div>

<script>
    function onCategoriaDeleteClick() {
        $(this).parent(".categoria-item")
                .off("click")
                .hide("slow", function () {
                    $(this).remove();
                });
    }

    function addCategoria(categoria) {
        var i = $("#Size_categoria");
        var $cat = $("<div/>")
                .addClass("categoria-item")
                .append($("<a/>").append($("<i/>").addClass("icon-tag")).addClass("btn"))
                        .append($("<input>")
                                    .prop('type', 'text')
                                    .prop('id', "Categoria[" + i.val() + "]")
                                    .prop('name', "Categoria[" + i.val() + "]")
                                    .prop('disabled', true)
                                    .val(categoria.label)
                                    .addClass("span12")
                                )
                        .append($("<a/>").append($("<i/>").addClass("icon-remove")).addClass("categoria-delete btn"))
                        .addClass("input-prepend input-append")
                .append($("<div/>")
                        .addClass("clear"));

        $("#listaCategorias").append($cat);

        $(".categoria-delete").click(onCategoriaDeleteClick);

        i.val(parseFloat(i.val()) + 1);
    }

    $(document).ready(function () {

        $("#telefone").mask("(99) 9999-9999");

        $("#categoria").autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: 'GET',
                    data: {'categoria': request.term},
                    url: 'findCategorias'
                }).success(function(data){
                            data = jQuery.parseJSON(data);
                            response($.map(data, function (item) {
                                return {
                                    label: item.nome,
                                    value: item.id
                                }
                            }))
                        });
            },
            select: function (event, ui){
                addCategoria(ui.item);
            }
        });

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