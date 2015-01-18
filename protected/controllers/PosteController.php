<?php

class PosteController extends Controller {

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
            'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('admin', 'delete', 'poste2', 'buscarZona', 'buscarPoste', 'buscarEstado', 'buscarMunicipio', 'buscarLocalidad', 'buscarAsentamiento', 'guardarPoste', 'test'),
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
                //'modelDireccionPoste' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Poste;
        $modelPosteDireccion = new PosteDireccion;
        $modelZona = new Zona;
        $modelDireccion = new Direccion;
        $modelAsentamiento = new Asentamiento;
        $modelLocalidad = new Localidad;
        $modelMunicipio = new Municipio;
        $modelEstado = new Estado;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
          $model->registrado_por = 1;
          $model->modificado_por = 1;
          $modelDireccion->registrado_por=$model->registrado_por;          
          $modelDireccion->modificado_por=$model->modificado_por;
          $modelZona->registrado_por==$model->registrado_por;          
          $modelZona->modificado_por==$model->registrado_por;          
          
        if (isset($_POST['Poste'])) {
            $model->attributes = $_POST['Poste'];
            if ($model->save()) {

                if (isset($_POST['Direccion'])) {
                    $modelDireccion->attributes = $_POST['Direccion'];
                    if ($modelDireccion->save()) {
                        if (isset($_POST['PosteDireccion'])) {
                            $modelPosteDireccion->attributes = $_POST['PosteDireccion'];
                            $modelPosteDireccion->id_poste = $model->id;
                            $modelPosteDireccion->id_direccion->$modelDireccion->id;
                            $modelPosteDireccion->id_zona=$modelZona->id;
                            
                            
                            if ($modelPostDireccion->save()) {
                                $this->redirect(array('view', 'id' => $model->id));
                            }
                        }
                    }
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelPosteDireccion' => $modelPosteDireccion,
            'modelZona' => $modelZona,
            'modelDireccion' => $modelDireccion,
            'modelAsentamiento' => $modelAsentamiento,
            'modelLocalidad' => $modelLocalidad,
            'modelMunicipio' => $modelMunicipio,
            'modelEstado' => $modelEstado,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);               
        $modelPosteDireccion = $this->loadModelPosteDireccion($model->id);        
        $modelZona = $this->loadModelZona($modelPosteDireccion->id_zona);
        
        
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
        if (isset($_POST['Poste'])) {
            $model->attributes = $_POST['Poste'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'modelPosteDireccion' => $modelPosteDireccion,
            'modelZona' => $modelZona,
            'modelDireccion' => $modelDireccion,
            'modelAsentamiento' => $modelAsentamiento,
            'modelLocalidad' => $modelLocalidad,
            'modelMunicipio' => $modelMunicipio,
            'modelEstado' => $modelEstado,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Poste');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Poste('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Poste']))
            $model->attributes = $_GET['Poste'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Poste the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Poste::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    
    public function loadModelPosteDireccion($id_poste) {
        $modelPosteDireccion = PosteDireccion::model()->getByIdPoste($id_poste);
        if ($modelPosteDireccion  === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $modelPosteDireccion ;
    }

    
    public function loadModelDireccion($id) {
        $modelDireccion = Direccion::model()->getById($id);
        if ($modelDireccion  === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $modelDireccion ;
    }

    public function loadModelZona($id_oficina) {
        $modelZona = Zona::model()->getByIdOficina($id_oficina);
        if ($modelZona  === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $modelZona;
    }
    
    
    /**
     * Performs the AJAX validation.
     * @param Poste $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'poste-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionPoste2()
    {
        $modelOficina = Oficina::model()->findAll();
        $parametros = array(
            "modelOficina" => $modelOficina,
        );
        $this->render("poste2", $parametros);
    }
    
    public function actionBuscarZona()
    {
        if(isset($_POST))
        {
            $id_oficina = $_POST['oficina'];
            $criteria = new CDbCriteria;
            $criteria->condition="id_oficina=".$id_oficina;        
            $model_zona = Zona::model()->findAll($criteria);            
            $parametros = array(
                "modelZona"=>$model_zona
            );
            $this->renderPartial("_frmZona", $parametros);
        }else{
            $this->renderPartial("_frmZona");
        }
        
    }
    
    
    public function actionBuscarPoste()
    {
        if(isset($_POST))
        {
            $model_poste = TipoPoste::model()->findAll();
            $parametros = array(
                "modelPoste"=>$model_poste
            );
            $this->renderPartial("_frmPoste", $parametros);
        }else{
            $this->renderPartial("_frmPoste");
        }        
    }
    
    public function actionBuscarEstado()
    {
        if(isset($_POST))
        {
            $id_pais = $_POST['pais'];
            $criteria = new CDbCriteria;
            $criteria->condition="id_pais=".$id_pais;        
            $model_estado = Estado::model()->findAll($criteria);            
            $parametros = array(
                "modelEstado"=>$model_estado,
            );
            $this->renderPartial("_frmEstado", $parametros);
        }else{
            $this->renderPartial("_frmEstado");
        }
    }
    
    public function actionBuscarMunicipio()
    {
        if(isset($_POST))
        {
            $id_estado = $_POST['estado'];
            $criteria = new CDbCriteria;
            $criteria->condition="id_estado=".$id_estado;
            $model_municipio = Municipio::model()->findAll($criteria);            
            $parametros = array(
                "modelMunicipio"=>$model_municipio,
            );
            $this->renderPartial("_frmMunicipio", $parametros);
        }else{
            $this->renderPartial("_frmMunicipio");
        }
    }
    
    public function actionBuscarLocalidad()
    {
        if(isset($_POST))
        {
            $id_municipio = $_POST['municipio'];
            $criteria = new CDbCriteria;
            $criteria->condition="id_municipio=".$id_municipio;
            $model_municipio = Localidad::model()->findAll($criteria);            
            $parametros = array(
                "modelLocalidad"=>$model_municipio,
            );
            $this->renderPartial("_frmLocalidad", $parametros);
        }else{
            $this->renderPartial("_frmLocalidad");
        }
    }
    
    public function actionBuscarAsentamiento()
    {
        if(isset($_POST))
        {
            $id_localidad= $_POST['localidad'];
            $criteria = new CDbCriteria;
            $criteria->condition="id_localidad=".$id_localidad;
            $model_asentamiento= Asentamiento::model()->findAll($criteria);            
            $parametros = array(
                "modelAsentamiento"=>$model_asentamiento,
            );
            $this->renderPartial("_frmAsentamiento", $parametros);
        }else{
            $this->renderPartial("_frmAsentamiento");
        }
    }
    
    public function actionGuardarPoste()
    {
        if(isset($_POST))
        {
            //Guardar la direccion
            $id_asentamiento = $_POST["id_asentamiento"];
            $calle = $_POST["calle"];
            $colonia = $_POST["colonia"];
            $localidad = $_POST["localidad"];
            $codigo_postal = $_POST["codigo_postal"];
            $estatus = $_POST["estatus"];
            $model = new Direccion;
            $model->id_asentamiento = $id_asentamiento;
            $model->calle = $calle;
            $model->colonia = $colonia;
            $model->localidad = $localidad;
            $model->codigo_postal = $codigo_postal;
            $model->estatus = $estatus;
            $model->fecha_registro=date("d-m-y H:i:s");
            $model->registrado_por=1;             
            if($model->save())
                $id_direcion = $model->id;
            
            $id_tipo_poste = $_POST["id_poste"];
            
            //Guarfar el poste
            $model = new Poste;
            $model->id_tipo_poste = $id_tipo_poste;
            $model->nombre="test";
            $model->nombre_corto="tets corto";
            $model->codigo="test codigo";
            $model->descripcion="test descricion";
            $model->estatus="ACTIVO";
            $model->registrado_por=1;
            $model->fecha_registro = date("d-m-y H:i:s");
            $id_poste;
            if($model->save())
              $id_poste = $model->id;
            
                       
            
            //guaardar la direcion del poste
//            $id_poste;
//            $id_direcion;
            $id_zona = $_POST["id_zona"];
            $dir_ip = $_POST["dir_ip"];
            $latitud = $_POST["latitud"];
            $longitud = $_POST["longitud"];
            $altitud = $_POST["altitud"];
            
            $model = new PosteDireccion();
            $model->id_poste = $id_poste;
            $model->id_direccion = $id_direcion;
            $model->id_zona = $id_zona;
            $model->dir_ip = $dir_ip;
            $model->latitud = $latitud;
            $model->altitud = $altitud;
            $model->longitud = $longitud;
            $model->registrado_por=1;
            $model->fecha_registro = date("d-m-y H:i:s");
            if($model->save())
                echo $model->id;
            
            
        }   
    }
    
    public function actionTest()
    {
//        $model = new PosteDireccion();
//        $id_direcion = 8;
//        $model->id_poste = 1;
//        $model->id_direccion=1;
//        $model->id_zona = 1;
//        $model->dir_ip = "127.0.01.";
//        $model->latitud = "12.123";
//        $model->longitud = "12.123";
//        $model->altitud = "12.123";
//        $model->estatus = "ACTIVO";
//        $model->registrado_por=1;
//        $model->fecha_registro = date("d-m-y H:i:s");
//        if($model->save())
//            var_dump ($model->id);
        
        $model = new Poste;
        $model->id_tipo_poste = 1;
        $model->nombre="test";
        $model->nombre_corto="tets corto";
        $model->codigo="123";
        $model->descripcion="test descricion";
        $model->estatus="ACTIVO";
        $model->registrado_por=1;
        $model->fecha_registro = date("d-m-y H:i:s");
        if($model->save())
         echo $model->id;
     
    }
}
