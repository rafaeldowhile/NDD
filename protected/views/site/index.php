<div class="container-fluid bg-1">
    <div class="row-fluid text-center">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png"/>
    </div>
    <div class="row-fluid">
        <p>
            <strong> Quer aparecer aqui? Clique <?php echo CHtml::link('aqui', CController::createUrl('cadastro/index'));?>. </strong>
        </p>
    </div>
</div>

<div id="map_canvas" style="z-index: 2"></div>

<script src="https://maps.googleapis.com/maps/api/js?v=2.exp&sensor=true&libraries=places"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mark.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/core.js"></script>