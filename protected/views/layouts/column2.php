<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid top-line">
    <div class="pull-right">
        <a class="btn btn-primary" href="<?php echo Yii::app()->baseUrl;?>/index.php/site/logout"><i class="icon-off icon-white"></i> Sair</a>
    </div>
</div>
<div id="wrap">
    <div class="row-fluid">
        <div class="span3">
            <ul class="nav nav-list">
                <li class="nav-header">Cadastro</li>
                <li class=""><a href="<?php echo Yii::app()->baseUrl;?>/index.php/empresa/index">Empresa</a></li>
                <li class="nav-header">Novidades</li>
                <li class=""><a href="<?php echo Yii::app()->baseUrl;?>/index.php/novidade/index">Adicionar Novidade</a></li>
                <li class=""><a href="<?php echo Yii::app()->baseUrl;?>/index.php/novidade/historico">Histórico de Novidades</a></li>
                <li class="nav-header">Informações</li>
                <li class=""><a href="#">Quantidade de Cliques</a></li>
                <li class=""><a href="#">Avaliação da Empresa</a></li>
                <li class="nav-header">Suporte</li>
                <li class=""><a href="#">Chat</a></li>
                <li class="nav-header">Sugestões</li>
                <li class=""><a href="#">Sugerir</a></li>
            </ul>
        </div>
        <div class="span9">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>