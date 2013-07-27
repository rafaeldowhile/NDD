<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/maps.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

</head>

<body>

    <?php echo $content; ?>

<div id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span3">
                <h6 style="color: #fff">Sobre o novidia</h6>
                <div class="row-fluid">
                    <a href="#">Quem somos</a>
                </div>
                <div class="row-fluid">
                    <a href="#">Como funciona</a>
                </div>
                <div class="row-fluid">
                    <a href="#">Termos de uso</a>
                </div>
                <div class="row-fluid">
                    <a href="#">Politica de privacidade</a>
                </div>
                <div class="row-fluid">
                    <a href="#">Contato</a>
                </div>
            </div>
            <div class="span3" style="color: #fff">
                <h5 style="color: #fff">Apareça no novidia</h5>
                <div class="row-fluid">
                    <a href="#">Cadastre-se e apareça</a>
                </div>

            </div>
            <div class="span3" style="color: #fff">
                <h6>Siga o novidia</h6>
                <div class="row-fluid">
                    <a href="#"><img src="<?php echo Yii::app()->baseUrl;?>/images/social/fb.png" width="20%"/> </a>
                </div>
                <div class="row-fluid">
                    <a href="#"><img src="<?php echo Yii::app()->baseUrl;?>/images/social/g.png" width="20%"/> </a>
                </div>
                <div class="row-fluid">
                    <a href="#"><img src="<?php echo Yii::app()->baseUrl;?>/images/social/twt.png" width="20%"/> </a>
                </div>
            </div>
            <div class="span3">
                <h6 style="color: #fff">Fale com o novidia</h6>
                <div class="row-fluid">
                    <small>De Segunda a sexta das 09 às 18 hrs</small>
                    <small>Porto Alegre, RS - (51) 85047452</small>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
