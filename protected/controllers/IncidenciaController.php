<?php

class IncidenciaController extends Controller {

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
    public function actionCreate($id = 0) {
        
        $this->layout = '//layouts/column1';
        
        $model = $id == 0 ? new Incidencia : $this->loadModel($id);        
        $modelIncidenciaTiempoFound = IncidenciaTiempo::model()->find(IncidenciaTiempo::model()->obtenerIncidenciaTiempoPorIdIncidencia($model->id));
        $modelIncidenciaTiempo = $modelIncidenciaTiempoFound != null ? $modelIncidenciaTiempoFound : new IncidenciaTiempo;
        if($model->id > 0){
            $modelIncidenciaTiempo->id_incidencia = $model->id; 
        }
        
        $modelPersonaMenor = new Persona();
        $modelPersonaMenorCaracteristica = new PersonaCaracteristica();
        $modelPersonaMenorVestimenta = new PersonaVestimenta();
        $returnStep = isset($_GET['next_step']) ? $_GET['next_step'] : -1;

// Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        $this->performAjaxValidationIncidenciaTiempo($modelIncidenciaTiempo);
        $this->performAjaxValidationPersonaMenor($modelPersonaMenor);

        // Insercion y actualizacion de incidencia tiempo
        $this->fn_performAjaxValidationIncidenciatiempo($modelIncidenciaTiempo);
        // Insercion y actualizacion de persona menor
        $this->fn_performAjaxValidationPersonaMenor($model->id);

        if (isset($_POST['Incidencia'])) {
            $model->attributes = $_POST['Incidencia'];
            $modelIncidenciaTiempo->validate();
            $model->registrado_por = 1;
            $model->modificado_por = 1;
            if ($model->save()) {  

                $returnStep = isset($_POST['next_step']) ? $_POST['next_step'] : -1;           
                $returnUrl = Yii::app()->createUrl('Incidencia/Create',array('id'=>$model->id,'next_step'=>$returnStep));
                echo CJSON::encode(array('result'=>true,'data'=>$returnUrl));
                Yii::app()->end();
                //$this->redirect(array('create', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelIncidenciaTiempo' => $modelIncidenciaTiempo,
            'modelPersonaMenor' => $modelPersonaMenor,
            'modelPersonaMenorCaracteristica' => $modelPersonaMenorCaracteristica,
            'modelPersonaMenorVestimenta' => $modelPersonaMenorVestimenta,
            'returnStep' => $returnStep
        ));
    }

    private function fn_performAjaxValidationIncidenciatiempo($modelIncidenciaTiempo) {                
        if (isset($_POST['IncidenciaTiempo'])) {
            $modelIncidenciaTiempo->attributes = $_POST['IncidenciaTiempo'];      
            $modelIncidenciaTiempo->registrado_por = 1;
            $modelIncidenciaTiempo->modificado_por = 1;      
            $saved = $modelIncidenciaTiempo->save();
            if($saved){
                $returnStep = isset($_POST['next_step']) ? $_POST['next_step'] : -1;
                $returnUrl = Yii::app()->createUrl('Incidencia/Create',array('id'=>$modelIncidenciaTiempo->id_incidencia,'next_step'=>$returnStep));
                echo CJSON::encode(array('result'=>true,'data'=>$returnUrl));
                Yii::app()->end();
            }            
        }        
    }

    private function fn_performAjaxValidationPersonaMenor($id_incidencia) {                
            if (isset($_POST['Persona'])) {
                //$modelIncidenciaTiempo->attributes = $_POST['Persona'];      
                //$modelIncidenciaTiempo->registrado_por = 1;
                //$modelIncidenciaTiempo->modificado_por = 1;      
                //$saved = $modelIncidenciaTiempo->save();
                //if($saved){
                    $returnStep = isset($_POST['next_step']) ? $_POST['next_step'] : -1;
                    $returnUrl = Yii::app()->createUrl('Incidencia/Create',array('id'=>$id_incidencia,'next_step'=>$returnStep));
                    echo CJSON::encode(array('result'=>true,'data'=>$returnUrl));
                    Yii::app()->end();
                //}            
            }        
        }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelIncidenciaTiempo = new IncidenciaTiempo;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Incidencia'])) {
            $model->attributes = $_POST['Incidencia'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'modelIncidenciaTiempo' => $modelIncidenciaTiempo
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model->estatus = 'ELIMINADO';
        $model->eliminado = 1;
        $model->save();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Incidencia');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Incidencia('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Incidencia']))
            $model->attributes = $_GET['Incidencia'];

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
        $model = Incidencia::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'incidencia-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }        
    }
    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidationIncidenciaTiempo($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'incidencia-tiempo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }        
    }
    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidationPersonaMenor($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'persona-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }        
    }

}
