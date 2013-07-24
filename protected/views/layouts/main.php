<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</head>

<body>

    <?php echo $content; ?>

</body>
</html>
