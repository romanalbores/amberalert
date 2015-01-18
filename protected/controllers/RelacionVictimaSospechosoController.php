<?php
class RelacionVictimaSospechosoController extends Controller
{
    
        public $a = 0;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'reporte'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'fotoVictima', 'visualizacion', 'ubicacionPoste', 'verImagen', 'config', 'detalleSemana', 'guardarConfiguracion', 'guardarConfiguracionPoste', 'listaPostes'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RelacionVictimaSospechoso;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RelacionVictimaSospechoso']))
		{
			$model->attributes=$_POST['RelacionVictimaSospechoso'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RelacionVictimaSospechoso']))
		{
			$model->attributes=$_POST['RelacionVictimaSospechoso'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RelacionVictimaSospechoso');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RelacionVictimaSospechoso('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RelacionVictimaSospechoso']))
			$model->attributes=$_GET['RelacionVictimaSospechoso'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionReporte()
        {
            if(isset($_POST['RelacionVictimaSospechoso'])){
                $this->render("index");
            }
            $model = RelacionVictimaSospechoso::model()->findAll(RelacionVictimaSospechoso::model()->obtenerListaRelacionVictimaSospechoso());
            $parametros = array(
                "model"=>$model
            );
            $this->render("reporte", $parametros);
        }
        
        public function actionGuardarConfiguracionPoste(){
            if(isset($_POST)){
                $configuracion = array();
                $poste = array();
                $incidencia = $_POST['incidencia'];
                
                var_dump($_POST);
                
                foreach ($_POST['configuracion'] as $value) {
                    foreach ($_POST['poste'] as $fila) {
                        echo "configuraicon ".$value." --- poste ".$fila."<br>";
                        $model = new ConfiguracionPoste;
                        $model->id_incidencia = $incidencia;
                        $model->id_configuracion = $value;
                        $model->id_poste_direccion = $fila;
                        $model->estatus = "ACTIVO";
                        $model->fecha_registro = date("Y-m-d H:i:s");
                        $model->registrado_por = 1;
                        $model->modificado_por = 0;
                        if($model->save()){
                            var_dump("GUARDADO");
                        }else{
                            var_dump("ERROR");
                            var_dump($model);
                        }
                    }
                }
                
//                //Agreggamos las configuraciona  nuestro array
//                foreach($_POST['poste'] as $value){
//                    array_push($poste, $value);
//                }
//                
//                foreach($_POST['configuracion'] as $value){
//                    array_push($configuracion, $value);
//                }
//                
//                foreach($configuracion as $configuracion){
//                    foreach ($poste as $poste) {
//                        echo "configuracion ".$configuracion." - poste ".$poste."<br>";
//                    }
//                }
                
                
            }
        }
        
        public function actionConfig()
        {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $this->render("configuracion", array("id_relacion" => $id));
            }
        }
        
        public function actionVisualizacion($id_relacion)
        {
            if(isset($_POST['visualizacion']))
            {
                $this->render("finalizarCaptura");
            }else{
                
                echo "valor de a".$this->a;
                $this->render("visualizacion", array("id_relacion"=>$id_relacion));
            }
        }
        
        public function actionGuardarConfiguracion()
        {
            $this->render(array("relacionVictimaSospechoso/reporte"));
        }
        
        public function actionUbicacionPoste()
        {
            
            if(isset($_GET['id'])){
                $id_relacion = $_GET['id'];                
                $parametros = array(
                    "id"=>$id_relacion
                );
                $this->render("ubicacionPoste", $parametros);
            }
            if(isset($_POST['ubicacion']))
            {
                $this->a = 2;
                $id = $_POST['id'];
                $model_hubicacion_h = $_POST['id_ubicacion'];
                $model_hubicacion = $_POST['ubicacion'];                
                #$this->redirect(array("relacionVictimaSospechoso/visualizacion", "id_relacion"=>$id));
                $this->render("visualizacion", array("id_relacion"=>1));
            }
            
            
//            if(isset($_POST['ubicacion']))
//            {
//                    var_dump($_POST);
//                    $array_ubicacion = $_POST['ubicacion'];
//                    $parametros = array(
//                            "model"=>$array_ubicacion,
//                            "id"=>1
//                    );
//                    $this->render("visualizacion", $parametros);
//            }
//            if(isset($_POST['visualizacion'])){
//                var_dump($_POST);
//                $this->render("finalizarCaptura");
//            }
//            $this->render("ubicacionPoste");
        }
        
        
        public function actionFotoVictima($id)
        {
            if(isset($id))
            {
                $parametros = array(
                    "valor"=>1,
                );
                $this->redirect(array('reporte'));
            }
        }
        
              
        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RelacionVictimaSospechoso the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RelacionVictimaSospechoso::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RelacionVictimaSospechoso $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='relacion-victima-sospechoso-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        public function actionVerImagen()
        {
            if(isset($_POST)){
                $id_usuario = $_POST['id_usuario'];
                //Validadndo si la existe una iamgen guardada en la base de datos
                $existe_avatar = RelacionVictimaSospechoso::model()->existeImagen($id_usuario);
                $avatar = ($existe_avatar)? $existe_avatar[0]['nombre'] : "";

                if($avatar){
                    //validar si existe en la ruta especificada
                    $ruta = Yii::app()->basePath."/..".$existe_avatar[0]['ruta'].$existe_avatar[0]['nombre'].".".$existe_avatar[0]['extension'];
                    #$imagen_perfil = Yii::app()->basePath."/../uploads/avatar/".$model_usuario['avatar'];        
                    if(file_exists($ruta))
                        echo "<img src='".$ruta."' alt='Sospechoso' height='150' width='120'>";
                    else
                        echo "<img src='".Yii::app()->baseUrl."/uploads/personas_images/perdido.jpg' alt='Sospechoso' height='150' width='120'>";
                }else
                    echo "<img src='".Yii::app()->baseUrl."/uploads/personas_images/perdido.jpg' alt='Sospechoso' height='150' width='120'>";
            }
        }
        
        public function actionDetalleSemana(){
            $titulo = "";
            $tabla = "";
            $tabla_tmp = "";
            if(isset($_POST))
            {
                $ids_usuario = $_POST['id_usuario'];
                $tabla = $tabla . "  <table id='table-horarios-detalle' class='table table-striped table-hover table-config'>
                        <thead>
                            <tr>                                
                                <th>Día</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                            </tr>
                        </thead>";
                
                $tabla_tmp = $tabla;
                foreach ($ids_usuario as $value) {                    
                    $id_config = (int)$value;
                    $model_detalle = Configuracion::model()->obtenerDetalleVisualizacion($id_config);
                    foreach ($model_detalle as $fila) {
                        $titulo =  "<p><h4>".$fila['nombre']."</h4></p>";
                        $tabla = $tabla . "<tr>";
                        #echo "<td>".$fila['nombre']."</td>";
                        $tabla = $tabla . "<td>".$fila['dia_particular']."</td>";
                        $tabla = $tabla . "<td>".$fila['hora_inicio']."</td>";
                        $tabla = $tabla . "<td>".$fila['hora_fin']."</td>";
                        $tabla = $tabla . "</tr>";
                    }
                    $tabla = $tabla . "<tbody>
                            </table>";
                    echo $titulo;
                    echo $tabla;
                    
                    $tabla = $tabla_tmp;
                    
                }
                
            }
        }
        
        public function actionListaPostes()
        {
            $this->render("listaPoste");
        }
        
}
