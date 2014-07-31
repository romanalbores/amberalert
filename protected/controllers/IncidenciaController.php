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
                'actions' => array('create', 'update','SubirImagenPersona'),
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

    public function actionSubirImagenPersona($id_persona) {
        $modelPersona = Persona::model()->findByPk($id_persona);
        if ($modelPersona === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        
        // If an error causes output to be generated before headers are sent - catch it.
        ob_start();

        // Upload data can be POST'ed as raw form data or uploaded via <iframe> and <form>
        // using regular multipart/form-data enctype (which is handled by PHP $_FILES).
        if (!empty($_FILES['fd-file']) and is_uploaded_file($_FILES['fd-file']['tmp_name'])) {
            // Regular multipart/form-data upload.
            $name = $_FILES['fd-file']['name'];
            $data = file_get_contents($_FILES['fd-file']['tmp_name']);
            $x = 0;
            $y = 0;
            $w = 0;
            $h = 0;
//            $res = $this->SubirArchivos('fd-file', '/../uploads/aprende_rollouts_images/', true);
            $res = $this->SubirImagen('fd-file', '/../uploads/personas_images/',false,true);
            
        } else {
            // Raw POST data.
            $name = $_SERVER['HTTP_X_FILE_NAME'];
            $data = file_get_contents("php://input");
//            $res = $this->SubirArchivos($name, '/../uploads/aprende_rollouts_images/', false);
            $res = $this->SubirImagen('fd-file', '/../uploads/personas_images/',false,false);
        }
        if($res != null){
            $modelCataImagen = new Imagen();
            $modelCataImagen->nombre = $res['nombre'];
            $modelCataImagen->extension = $res['tipo'];
            $modelCataImagen->ruta = "/uploads/personas_images/";
            $modelCataImagen->save();
            $modelDataImagenPersona = new DataImagenPersona();
            $modelDataImagenPersona->id_imagen = $modelCataImagen->id;
            $modelDataImagenPersona->id_persona = $modelPersona->id;
            $modelDataImagenPersona->save();            
        }
        echo CJSON::encode($res);
        Yii::app()->end();
    }
    
    /**
     * Funcion para subir imagenes
     * @param string $NameField
     * @return string
     */
    private function SubirImagen($NameField, $path = '/../uploads/', $crop = false, $file = true) {
        $res = array('nombre' => '', 'tipo' => '');
        //new Upload($_FILES[$NameField]);
        $handle = $file ? Yii::createComponent('application.extensions.subir_archivo.Upload', $_FILES[$NameField]) :
                Yii::createComponent('application.extensions.subir_archivo.Upload', 'php:' . $NameField);
        // then we check if the file has been uploaded properly
        if ($handle->uploaded) {
            // yes, the file is on the server
            // below are some example settings which can be used if the uploaded file is an image.
//            $handle->image_resize = true;
            $nombre_nuevo = uniqid();
            $handle->file_new_name_body = $nombre_nuevo;
            $handle->image_ratio_y = true;
            $handle->image_x = $handle->image_src_x;

            // now, we start the upload 'process'. That is, to copy the uploaded file
            // from its temporary location to the wanted location
            // It could be something like $handle->Process('/home/www/my_uploads/');
            $handle->Process(Yii::app()->basePath . $path);
            // we check if everything went OK
            if ($handle->processed) {
                if ($crop) {
                    //$res = $this->crearImagen($x, $y, $w, $h, $x3, $y3, $handle->file_dst_name, $nombre_nuevo, $handle, $path);
                    $res['nombre'] = $nombre_nuevo;
                    if($handle->file_src_name_ext!=""){
                        $res['tipo'] = $handle->file_src_name_ext;
                    }
                    elseif ($handle->file_src_mime == "image/jpeg") {
                        $res['tipo'] = "jpg";
                    }                    
                } else {
                    $res['nombre'] = $nombre_nuevo;
                    if($handle->file_src_name_ext!=""){
                        $res['tipo'] = $handle->file_src_name_ext;
                    }
                    elseif ($handle->file_src_mime == "image/jpeg") {
                        $res['tipo'] = "jpg";
                    } 
                }
//                $res['nombre'] = $nombre_nuevo;
//                $res['tipo'] = $handle->file_src_name_ext;
                return $res;
            } else {
                return null;
            }
            // we delete the temporary files
            $handle->Clean();
        } else {
            return null;
        }
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
        
        /**
         * Seccion de persona menor
         */
        $model_id = $model->id >0 ? $model->id : 0;
        $modelPersonaMenorFound = Persona::model()->obtenerPersonaPorIdIncidencia($model_id);
        $modelPersonaMenor = $modelPersonaMenorFound != null ? $modelPersonaMenorFound : new Persona;
        $modelPersonaMenorCaracteristicaFound = PersonaCaracteristica::model()->find(PersonaCaracteristica::model()->getByIdPersona($modelPersonaMenor->id));
        $modelPersonaMenorCaracteristica = $modelPersonaMenorCaracteristicaFound != null ? $modelPersonaMenorCaracteristicaFound : new PersonaCaracteristica();
        if($model->id > 0){            
            $modelPersonaMenorCaracteristica->id_incidencia = $model->id;
        }
        if($modelPersonaMenor->id > 0){            
            $modelPersonaMenorCaracteristica->id_persona = $modelPersonaMenor->id;                                
        }
        $id_caracteristica_menor = $modelPersonaMenorCaracteristica->id >0 ? $modelPersonaMenorCaracteristica->id : 0;
        $modelPersonaMenorVestimentaFound = PersonaVestimenta::model()->find(PersonaVestimenta::model()->getByIdPersonaCaracteristica($id_caracteristica_menor));
        $modelPersonaMenorVestimenta = $modelPersonaMenorVestimentaFound != null ? $modelPersonaMenorVestimentaFound : new PersonaVestimenta();
        if($modelPersonaMenorCaracteristica->id > 0){
            $modelPersonaMenorVestimenta->id_persona_caracteristica = $modelPersonaMenorCaracteristica->id;                                
        }
        
        /**
         * Seccion de persona sospechosa
         */
        $modelPersonaSospechosoFound = Persona::model()->obtenerPersonaSospechosoPorIdIncidencia($model->id);
        $modelPersonaSospechoso = $modelPersonaSospechosoFound != null ? $modelPersonaSospechosoFound : new Persona;
        $modelPersonaSospechosoCaracteristicaFound = PersonaCaracteristica::model()->find(PersonaCaracteristica::model()->getByIdPersona($modelPersonaSospechoso->id));
        $modelPersonaSospechosoCaracteristica = $modelPersonaSospechosoCaracteristicaFound != null ? $modelPersonaSospechosoCaracteristicaFound : new PersonaCaracteristica();
        if($model->id > 0){            
            $modelPersonaSospechosoCaracteristica->id_incidencia = $model->id;
        }
        if($modelPersonaSospechoso->id > 0){            
            $modelPersonaSospechosoCaracteristica->id_persona = $modelPersonaSospechoso->id;                                
        }
        $id_caracteristica_sospechoso = $modelPersonaSospechosoCaracteristica->id >0 ? $modelPersonaSospechosoCaracteristica->id : 0;
        $modelPersonaSospechosoVestimentaFound = PersonaVestimenta::model()->find(PersonaVestimenta::model()->getByIdPersonaCaracteristica($id_caracteristica_sospechoso));
        $modelPersonaSospechosoVestimenta = $modelPersonaSospechosoVestimentaFound != null ? $modelPersonaSospechosoVestimentaFound : new PersonaVestimenta();
        if($modelPersonaSospechosoCaracteristica->id > 0){
            $modelPersonaSospechosoVestimenta->id_persona_caracteristica = $modelPersonaSospechosoCaracteristica->id;                                
        }
        
        /**
         * Llenando datos de modelo persona
         */
        $persona = Persona::model()->findByPk(1);
        
        $returnStep = isset($_GET['next_step']) ? $_GET['next_step'] : -1;

// Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        $this->performAjaxValidationIncidenciaTiempo($modelIncidenciaTiempo);
        $this->performAjaxValidationPersonaMenor(
                $modelPersonaMenor, 
                $modelPersonaMenorCaracteristica, 
                $modelPersonaMenorVestimenta);
        
        $this->performAjaxValidationImagen($persona);

        // Insercion y actualizacion de incidencia tiempo
        $this->fn_performAjaxValidationIncidenciatiempo($modelIncidenciaTiempo);
        if (isset($_POST['Persona']['tipo_persona']) && $_POST['Persona']['tipo_persona'] =="VICTIMA") {
            // Insercion y actualizacion de persona menor
            $this->fn_performAjaxValidationPersonaMenor($model->id,$modelPersonaMenor,$modelPersonaMenorCaracteristica,$modelPersonaMenorVestimenta);
        }
        
        if (isset($_POST['Persona']['tipo_persona']) && $_POST['Persona']['tipo_persona'] =="SOSPECHOSO") {
            // Insercion y actualizacino de persona sospechosa
            $this->fn_performAjaxValidationPersonaSospechoso($model->id, $modelPersonaMenor->id, $modelPersonaSospechoso,$modelPersonaSospechosoCaracteristica,$modelPersonaSospechosoVestimenta);
        }        
        if (isset($_POST['Persona']['tipo_imagen']) && $_POST['Persona']['tipo_imagen'] =="IMAGEN_PERSONA_MENOR") {
            // Insercion y actualizacino de persona sospechosa
            $this->fn_performAjaxValidationImagen($model->id,$_POST['Persona']['id']);
        }
        if (isset($_POST['Persona']['tipo_imagen']) && $_POST['Persona']['tipo_imagen'] =="IMAGEN_PERSONA_SOSPECHOSO") {
            // Insercion y actualizacino de persona sospechosa
            $this->fn_performAjaxValidationImagen($model->id,$_POST['Persona']['id']);
        }

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
            'modelPersonaSospechoso' => $modelPersonaSospechoso,
            'modelPersonaSospechosoCaracteristica' => $modelPersonaSospechosoCaracteristica,
            'modelPersonaSospechosoVestimenta' => $modelPersonaSospechosoVestimenta,
            'returnStep' => $returnStep
        ));
    }

    private function fn_performAjaxValidationImagen($id_incidencia) {                
        $saved = true;
        if($saved){
            $returnStep = isset($_POST['next_step']) ? $_POST['next_step'] : -1;
            $returnUrl = Yii::app()->createUrl('Incidencia/Create',array('id'=>$id_incidencia,'next_step'=>$returnStep));
            echo CJSON::encode(array('result'=>true,'data'=>$returnUrl));
            Yii::app()->end();
        }        
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

    private function fn_performAjaxValidationPersonaMenor(
            $id_incidencia, 
            $modelPersonaMenor,
            $modelPersonaMenorCaracteristica, 
            $modelPersonaMenorVestimenta
        ) {
            
            $returnStep = isset($_POST['next_step']) ? $_POST['next_step'] : -1;
            $returnUrl = Yii::app()->createUrl('Incidencia/Create',array('id'=>$id_incidencia,'next_step'=>$returnStep));
            if (isset($_POST['Persona'])) {
                $modelPersonaMenor->attributes = $_POST['Persona'];      
                $modelPersonaMenor->registrado_por = 1;
                $modelPersonaMenor->modificado_por = 1;      
                $saved = $modelPersonaMenor->save();
                if($saved){
                    
                    $modelRelacionVictimaSospechosoFound = RelacionVictimaSospechoso::model()->find(RelacionVictimaSospechoso::model()->getByIdPersonaVictima($modelPersonaMenor->id));
                    $modelRelacionVictimaSospechoso = $modelRelacionVictimaSospechosoFound != null ? $modelRelacionVictimaSospechosoFound : new RelacionVictimaSospechoso();
                    $modelRelacionVictimaSospechoso->id_persona_victima = $modelPersonaMenor->id;
                    $modelRelacionVictimaSospechoso->id_incidencia = $id_incidencia;
//                    $modelRelacionVictimaSospechoso->id_tipo_relacion  =1;
                    $guardo = $modelRelacionVictimaSospechoso->save();                    
                    $errores = $modelRelacionVictimaSospechoso->getErrors();                    
                    $saved = $this->fn_performAjaxValidationPersonaMenorCaracteristica($modelPersonaMenor->id, $modelPersonaMenorCaracteristica);
                    if($saved){                        
                        $saved = $this->fn_performAjaxValidationPersonaMenorVestimenta($modelPersonaMenorCaracteristica->id, $modelPersonaMenorVestimenta);
//                        $saved = true;
                        
                        if($saved){                            
                            echo CJSON::encode(array('result'=>true,'data'=>$returnUrl));                        
                        }
                        else{
                            echo CJSON::encode(array('result'=>false,'data'=>$returnUrl));
                        }
                        Yii::app()->end();
                    }
                }            
            }        
        }
        
    private function fn_performAjaxValidationPersonaSospechoso(
            $id_incidencia, 
            $id_victima,
            $modelPersonaMenor,
            $modelPersonaMenorCaracteristica, 
            $modelPersonaMenorVestimenta
        ) {
            
            $returnStep = isset($_POST['next_step']) ? $_POST['next_step'] : -1;
            $returnUrl = Yii::app()->createUrl('Incidencia/Create',array('id'=>$id_incidencia,'next_step'=>$returnStep));
            if (isset($_POST['Persona'])) {
                $modelPersonaMenor->attributes = $_POST['Persona'];      
                $modelPersonaMenor->registrado_por = 1;
                $modelPersonaMenor->modificado_por = 1;      
                $saved = $modelPersonaMenor->save();
                if($saved){
                    
                    $modelRelacionVictimaSospechosoFound = RelacionVictimaSospechoso::model()->find(RelacionVictimaSospechoso::model()->getByIdPersonaVictima($id_victima));
                    $modelRelacionVictimaSospechoso = $modelRelacionVictimaSospechosoFound != null ? $modelRelacionVictimaSospechosoFound : new RelacionVictimaSospechoso();
                    $modelRelacionVictimaSospechoso->id_persona_sospechoso = $modelPersonaMenor->id;
                    $modelRelacionVictimaSospechoso->id_incidencia = $id_incidencia;
//                    $modelRelacionVictimaSospechoso->id_tipo_relacion  =1;
                    $guardo = $modelRelacionVictimaSospechoso->save();                    
                    $errores = $modelRelacionVictimaSospechoso->getErrors();                    
                    $saved = $this->fn_performAjaxValidationPersonaMenorCaracteristica($modelPersonaMenor->id, $modelPersonaMenorCaracteristica);
                    if($saved){                        
                        $saved = $this->fn_performAjaxValidationPersonaMenorVestimenta($modelPersonaMenorCaracteristica->id, $modelPersonaMenorVestimenta);
//                        $saved = true;
                        
                        if($saved){                            
                            echo CJSON::encode(array('result'=>true,'data'=>$returnUrl));                        
                        }
                        else{
                            echo CJSON::encode(array('result'=>false,'data'=>$returnUrl));
                        }
                        Yii::app()->end();
                    }
                }            
            }        
        }
        
    private function fn_performAjaxValidationPersonaMenorCaracteristica($id_persona, $modelPersonaMenorCaracteristica) {
            if (isset($_POST['PersonaCaracteristica'])) {
                $modelPersonaMenorCaracteristica->attributes = $_POST['PersonaCaracteristica'];      
                $modelPersonaMenorCaracteristica->id_persona = $id_persona;
                $modelPersonaMenorCaracteristica->registrado_por = 1;
                $modelPersonaMenorCaracteristica->modificado_por = 1;      
                $saved = $modelPersonaMenorCaracteristica->save();
                return $saved;
            }        
        }
    private function fn_performAjaxValidationPersonaMenorVestimenta($id_persona_caracteristica, $modelPersonaMenorVestimenta) {
            if (isset($_POST['PersonaVestimenta'])) {
                $modelPersonaMenorVestimenta->attributes = $_POST['PersonaVestimenta'];      
                $modelPersonaMenorVestimenta->id_persona_caracteristica = $id_persona_caracteristica;
                $modelPersonaMenorVestimenta->registrado_por = 1;
                $modelPersonaMenorVestimenta->modificado_por = 1;      
                $saved = $modelPersonaMenorVestimenta->save();
                return $saved;
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
    protected function performAjaxValidationImagen($model) {
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'imagenes-formIMAGEN_PERSONA_MENOR' || $_POST['ajax'] === 'imagenes-formIMAGEN_PERSONA_SOSPECHOSO')) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }        
    }
    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidationPersonaMenor(
            $modelPersonaMenor, 
            $modelPersonaMenorCaracteristica, 
            $modelPersonaMenorVestimenta) 
    {
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'persona-sospechoso-form' || $_POST['ajax']== 'persona-menor-form')) {
            echo CActiveForm::validate(
                    array(
                        $modelPersonaMenor,
                        $modelPersonaMenorCaracteristica,
                        $modelPersonaMenorVestimenta
                    )
                );
            Yii::app()->end();
        }        
    }

}
