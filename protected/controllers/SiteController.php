<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $estab = Estabelecimento::model()->findAll();
        $this->render('index', array('estab' => $estab));
	}

    public function actionProcuraEstabelecimento(){
        $marker = $_POST["ajaxData"];

        $new = new Estabelecimento;
        $new->latitude = $marker['latitude'];
        $new->longitude = $marker['longitude'];

        /*
         * Procura pelo estabelecimento
         */
        $est = Estabelecimento::model()->findByAttributes(array('latitude' => $new->latitude, 'longitude' => $new->longitude));

        /*
         * Se não existir, será salvo no banco de dados.
         */
        if (!isset($est)) {
            $new->nome = $marker['title'];
            $new->save();
            echo '';
        } else {
            /*
             * Se existir e possuir uma novidade no dia, será retornado o texto na novidade.
             */
            $novidade = Novidade::model()->findByAttributes(array('latitude' => $new->latitude, 'longitude' => $new->longitude));
            if ($novidade != null) {
                echo $novidade->texto;
            } else {
                echo '';
            }
        }
    }
}