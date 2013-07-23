<?php
/* @var $this CadastroController */

$this->breadcrumbs=array(
	'Cadastro',
);
?>

<div class="row-fluid">
    <div class="form">
        <form>
            <label id="lblusuario" for="usuario">Usuário:</label>
            <?php echo CHtml::activeTextField($model, 'email', array('id' => 'usuario'))?>

            <label id="lblsenha" for="senha">Senha:</label>
            <?php echo CHtml::activePasswordField($model, 'senha', array('id' => 'senha')) ?>

            <div class="form-actions">
                <?php echo CHtml::submitButton('Salvar') ?>
            </div>
        </form>
    </div>
</div>