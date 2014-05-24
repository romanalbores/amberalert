<?php

class ConfiguracionDiaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ConfiguracionDia;
        $modelDH = new ConfiguracionDH;
        $model->registrado_por = 1;
        $model->modificado_por = 1;
        if (isset($_POST['ConfiguracionDia'])) {
            $model->attributes = $_POST['ConfiguracionDia'];
            if ($model->save()) {
                if (isset($_POST['ConfiguracionDH'])) {
                    $arrayDias = $_POST['ConfiguracionDH']['id_dia'];
                    $horaInicio = substr($_POST['ConfiguracionDH']['hora_inicio'], 0, 5);
                    $horaFin = substr($_POST['ConfiguracionDH']['hora_fin'], 0, 5);
                    $horaInicio .=":00";
                    $horaFin .=":00";
                    $flag=false;
                    foreach ($arrayDias as $dia) {
                        $flag=false;
                        $modelDH = new ConfiguracionDH;
                        $modelDH->id_dia = $dia;
                        $modelDH->hora_inicio = $horaInicio;
                        $modelDH->hora_fin = $horaFin;
                        $modelDH->configuracion_id = $model->id;
                        $modelDH->estatus = 'ACTIVO';
                        $modelDH->eliminado = 0;
                        if ($modelDH->save()){                            
                            $flag=true;
                        }
                    }
                    if($flag){
                      $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
            'modelDH' => $modelDH,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelDH = $this->loadModelDH($id);
        //$modelD = $this->loadModelD($id);
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['ConfiguracionDia'])) {
            $model->attributes = $_POST['ConfiguracionDia'];
            $modelDH->attributes = $_POST['ConfiguracionDH'];
            // $modelD->attributes = $_POST['ConfiguracionD'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'modelDH' => $modelDH,
                //   'modelD' => $modelD,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ConfiguracionDia');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ConfiguracionDia('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ConfiguracionDia']))
            $model->attributes = $_GET['ConfiguracionDia'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = ConfiguracionDia::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelDH($id) {
        $modelDH = ConfiguracionDH::model()->getByIdConfiguracion($id);
        if ($modelDH === null)
        //  throw new CHttpException(404, 'The requested page does not exist.');
            return $modelDH;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'configuracion-dia-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
