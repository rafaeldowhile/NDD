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
        <div class="span8">
            <p>Novidade do dia! Aqui você encontra as melhores ofertas do <strong>dia</strong> oferecida pelos melhores lugares.</p>
        </div>
        <div class="span4">
            <p>
                <strong>
                    Quer aparecer aqui? Clique <?php echo CHtml::link('aqui', 'cadastro/index')?>.
                </strong>
            </p>
        </div>
    </div>
    <div class="row-fluid">
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
</div>


<div id="map_canvas"></div>

