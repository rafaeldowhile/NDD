<?php
/* @var $this CadastroController */

$this->breadcrumbs=array(
	'Cadastro',
);
?>
<div class="page-header">
    <h1>novidia <small>Novidades do dia dos melhores estabelecimentos!</small></h1>
</div>
<div class="row-fluid" style="height: 100%;margin: 0;padding: 0;">
        <div class="form-inline text-center">
            <form>
                <?php echo CHtml::activeTextField($model,
                                                    'nome',
                                                    array('id' => 'nome',
                                                        'placeholder' => 'Seu Nome',
                                                        'required' => 'true'))?>

                <?php echo CHtml::activeTextField($model,
                                                  'email',
                                                  array('id' => 'usuario',
                                                        'placeholder'=>'Seu Email',
                                                        'required'=>'true'))?>
                <?php echo CHtml::activeTextField($model,
                                                    'email',
                                                    array('id' => 'usuario_repeat',
                                                        'placeholder'=>'Repita Seu Email',
                                                        'required'=>'true'))?>

                <?php echo CHtml::activePasswordField($model,
                                                      'senha',
                                                       array('id' => 'senha',
                                                              'placeholder' => 'Nova Senha',
                                                              'required'=>'true')) ?>

                <?php echo CHtml::submitButton('Registrar', array('class'=>'btn btn-large')) ?>
            </form>
        </div>
</div>