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

    public function actionIndex()
    {   
        $this->render('index');
    }

    public function actionSubscribe() {

        if ($_POST['Susbcribe']) {
            
        }

    }


    public function actionLogin() {
        $model = new LoginForm();
        $mensagem = null;
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->login()) {
                $this->redirect(CController::createUrl('empresa/index'));
            } else {
                $mensagem = "Usuário e senha incorretos.";
            }
        }

        $this->render('login', array('model'=>$model, 'mensagem'=>$mensagem));
    }

    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->baseUrl);
    }
    
    public function actionProcuraEstabelecimento() {

        $est = Estabelecimento::model()->with(array(
                                                'novidades'=>array(
                                                                    'joinType'=>'LEFT OUTER JOIN',
                                                                    'on'=> 'novidades.data_novidade = "' . (new DateTime())->format('Y-m-d') . '"'
                                                                    )
                                                )
                                            )->findAll();

        echo CJSON::encode($this->convertModelToArray($est));
    }
    
    public function actionFindEstabelecimento(){
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $estabelecimentos = Estabelecimento::model()->findByAttributes(array('latitude' => $latitude, 'longitude' => $longitude));
        echo CJSON::encode($this->convertModelToArray($estabelecimentos));
    }

    public function convertModelToArray($models) {
        if (is_array($models))
            $arrayMode = TRUE;
        else {
            $models = array($models);
            $arrayMode = FALSE;
        }

        $result = array();
        foreach ($models as $model) {
            if ($arrayMode)
                array_push($result, $model->toJSON());
            else
                $result = $model->toJSON();
        }
        return $result;
    }
}