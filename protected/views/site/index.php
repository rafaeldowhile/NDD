
<div id="divLogin" class="container-fluid div_login text-center" style="display: none; padding-top: 1.5%">
    <form id="formLogin" action="<?php echo $this->createUrl('site/login') ?>" method="POST" class="form-inline">
        <input id="LoginForm[username]" name="LoginForm[username]" placeholder="Login" type="text"  class="span2" required/>
        <input id="LoginForm[password]" name="LoginForm[password]" placeholder="Senha" type="password" class="span2" required/>
        <a href="#" onclick="Login();"><i class="icon-ok icon-white"></i></a>
        <button style="opacity: 0"></button>
        <label class="checkbox" style="color: #FFF; font-size: 80%">
            <input type="checkbox" name="remember" id="remember"/><small>Mantenha-me conectado</small>
        </label>
        <a href="#"><small>Esqueci minha senha</small></a>
        <a id="closeLogin" class="pull-right"><i class="icon-remove icon-white"></i></a>
    </form>
    <script>
        function Login(){
            $("#formLogin").submit();
        }
    </script>
</div>


<div class="container-fluid bg-1">
    <div class="pull-right">
        <a id="openLogin" class="btn btn-primary btn-medium"><i class="icon-user icon-white"></i></a>
        <a id="openSearch" class="btn btn-primary btn-medium"><i class="icon-search icon-white"></i></a>
    </div>

    <div class="row-fluid">
        <div class="span3" style="color: #1F4BEA">
            <h4><strong><?php echo CHtml::link('Apareça aqui', CController::createUrl('cadastro/index'));?>. </strong></h4>
        </div>
    </div>

    <div class="row-fluid text-center logo_home">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png"/>
    </div>

    <div class="row-fluid text-center" style="padding-top: 3%">
        <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="alert alert-success alert-block">
            <a class="close" data-dismiss="alert" href="#">&times;</a>
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
        <?php endif; ?>

        <?php if (Yii::app()->user->hasFlash('error')): ?>
        <div class="alert alert-error">
            <a class="close" data-dismiss="alert" href="#">&times;</a>
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
        <?php endif; ?>
        <form method="POST">
            <h2>Receba as melhores novidades do dia, assine aqui!</h2>
            <input type="email" id="Assinante[email]" name="Assinante[email]" placeholder="Seu Email De Assinante." required class="input-xxlarge text-center" style="height: 40px; font-size: 25px"/>
        </form>
    </div>
</div>

<div id="divSearch" class="container-fluid div_search text-center" style="display: none">
    <div class="container-fluid text-center">
        <strong style="color: #FFF;">Endereço</strong>
        <input id="txtEndereco" type="textbox" class="input-xxlarge"/>
        <a href="#" id="btnSearch"><i class="icon-search icon-white"></i></a>
        <a id="closeSearch" class="pull-right"><i class="icon-remove icon-white"></i></a>
    </div>
</div>

<div id="map_canvas" style="z-index: 2"></div>

<script src="https://maps.googleapis.com/maps/api/js?v=2.exp&sensor=true&libraries=places"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mark.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/core.js"></script>

<script>
    $(document).ready(function () {
        $("#divSearch").css("display", "none");
        $("#divLogin").css("display", "none");
        
        var geocoder = new google.maps.Geocoder();

        $("#txtEndereco").autocomplete({
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
                $("#txtEndereco").val(ui.item.label);
                $.ajax({
                    url: 'index.php/site/findEstabelecimento',
                    type: "POST",
                    data: { latitude: ui.item.latitude, longitude: ui.item.longitude },
                    success: function(data){
                        data = jQuery.parseJSON(data);
                        for (var i = 0; i < data.length; i++) {
                            createMarker(jQuery.parseJSON(data[i]).jsonDataSource);
                        }
                    }
                });
            }
        });
    });
    
    $("#btnSearch").click(function(){
        var latitude;
        var longitude;
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': $("#txtEndereco").val() + ', Brasil', 'region': 'BR' }, function (results, status) {
            $.map(results, function (item) {
//                latitude = item.geometry.location.lat();
//                longitude = item.geometry.location.lng();
                $.ajax({
                    url: 'index.php/site/findEstabelecimento',
                    type: "POST",
                    data: { latitude: item.geometry.location.lat(), longitude: item.geometry.location.lng() },
                    success: function(data){
                        data = jQuery.parseJSON(data);
                        for (var i = 0; i < data.length; i++) {
                            createMarker(jQuery.parseJSON(data[i]).jsonDataSource);
                        }
                    }
                });
            });
        });
        
        
    });
    
    $("#closeSearch").click(function(){
        $("#divSearch").slideUp("slow");
        $("#txtEndereco").val("");
    });
    
    $("#openSearch").click(function(){
        $("#divSearch").slideDown("slow");
        $("#txtEndereco").focus();
    });
    
    $("#openLogin").click(function(){
        $("#divLogin").slideDown("slow");
    });
    
    $("#closeLogin").click(function(){
        $("#divLogin").slideUp("slow");
        $("#txtEndereco").val("");
    });
</script>