<?php

class CadastroController extends Controller
{

	public function actionIndex()
	{
        $model = new Usuario;

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->save()){
                $lf = new LoginForm();
                $lf->setUsername($model->email);
                $lf->setPassword($_POST['Usuario']['senha']);

                if ($lf->login()) {
                    $this->redirect(array('empresa/index'));
                }
            }
        }

		$this->render('index', array('model'=>$model));
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