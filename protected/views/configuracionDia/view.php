<?php
$this->breadcrumbs=array(
	'Configuracion Dias'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ConfiguracionDia','url'=>array('index')),
array('label'=>'Create ConfiguracionDia','url'=>array('create')),
array('label'=>'Update ConfiguracionDia','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ConfiguracionDia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ConfiguracionDia','url'=>array('admin')),
);
?>

<h1>View ConfiguracionDia #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
		'nombre_corto',
		'codigo',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		'estatus',		
),
)); ?>
