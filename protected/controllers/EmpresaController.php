<?php

class EmpresaController extends Controller
{
    public $layout='//layouts/column2';

	public function actionIndex()
	{
        $model = Estabelecimento::model()->findByAttributes(array('id_usuario'=>Yii::app()->user->getId()));

        if ($model === null) {
            $model = new Estabelecimento();
        }

        $mensagem = null;
        if (isset($_GET['mensagem'])) {
            $mensagem = $_GET['mensagem'];
        }

        if(isset($_POST['Estabelecimento'])) {
            $model->attributes = $_POST['Estabelecimento'];
            $model->id_usuario = Yii::app()->user->getId();
            if ($model->save()) {
                $mensagem = 'Empresa registrada com sucesso!';
            }
        }

		$this->render('index', array('model'=>$model, 'mensagem'=>$mensagem ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}