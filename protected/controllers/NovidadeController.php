<?php

class NovidadeController extends Controller
{
    public $layout='//layouts/column2';

	public function actionIndex()
	{
        $model = new Novidade();
        $estabelecimento = Estabelecimento::model()->findByAttributes(array('id_usuario'=>Yii::app()->user->getId()));

        if ($estabelecimento === null) {
            $this->redirect(CController::createUrl('empresa/index', array('mensagem'=>'Primeiro faça o registro da empresa.')));
        }

        if (isset($_POST['Novidade'])) {
            $model->attributes = $_POST['Novidade'];

            $model->id_empresa = $estabelecimento->id;

            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Novidade adicionada com sucesso.');
            } else {
                Yii::app()->user->setFlash('error', 'Problemas ao adicionar a novidade. Por favor, nos contate.');
            }
        }

        $find = Novidade::model()->findByAttributes(array('id_empresa' => $estabelecimento->id, 'data_novidade' => date('yyyy-MM-dd')));

        if (isset($find)) {
            $model = $find;
        }

		$this->render('index', array('model'=>$model));
	}

    public function actionHistorico()
    {
        $estabelecimento = Estabelecimento::model()->findByAttributes(array('id_usuario'=>Yii::app()->user->getId()));
        $listaNovidades = $estabelecimento->novidades;
        $this->render('historico', array('listaNovidades'=>$listaNovidades));
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