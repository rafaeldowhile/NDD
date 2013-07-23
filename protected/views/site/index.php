<style>
    .labels {
        width: 100px;
        color: #000;
        font-size: 15px;
        font-weight: bold;
        font-variant: ruby;
    }
</style>

<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #map-canvas, #map_canvas {
        height: 100%;
    }

    @media print {
        html, body {
            height: auto;
        }

        #map-canvas, #map_canvas {
            height: 650px;
        }
    }

    #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
    }
</style>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.0&key=AIzaSyALPiNlx5KpzDb93X5ecFrbFIjpw0KZXn8&sensor=true&libraries=places"></script>
<!--script src="https://maps.googleapis.com/maps/api/js?v=2.exp&sensor=true&libraries=places"></script-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mark.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/core.js"></script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <h2>Novidade do dia!</h2>
            <p><small>Aqui você encontra as melhores ofertas do <strong>dia</strong> oferecida pelos melhores lugares.</small></p>
        </div>
        <div class="span9">
            <form class="form-inline">
                <fieldset>
                    <legend>Filtre sobre o que você procura por hoje!</legend>
                    <label>O que você quer?</label>
                    <select>
                        <option>Selecione</option>
                        <optgroup label="Lugares">
                            <option>Bares</option>
                            <option>Restaurantes</option>
                            <option>Festas</option>
                        </optgroup>
                    </select>
                    <button type="submit" class="btn btn-large">Procurar</button>
                </fieldset>
            </form>

        </div>
        <div class="span1">
            <button onClick="mymenu.toggle();" class="btn btn-block sideviewtoggle">Menu</button>
        </div>
    </div>
</div>


<div id="map_canvas"></div>

