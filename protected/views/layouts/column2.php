<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="wrap">
    <div class="row-fluid">
        <div class="span3">
            <ul class="nav nav-list">
                <li class="nav-header">Cadastro</li>
                <li class="active"><a href="<?php echo Yii::app()->baseUrl;?>/index.php/empresa/index">Empresa</a></li>
                <li class="nav-header">Novidades</li>
                <li class=""><a href="#">Adicionar Novidade</a></li>
                <li class=""><a href="#">Histórico de Novidades</a></li>
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