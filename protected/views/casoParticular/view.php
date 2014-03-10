<?php
$this->breadcrumbs=array(
	'Caso Particulars'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List CasoParticular','url'=>array('index')),
array('label'=>'Create CasoParticular','url'=>array('create')),
array('label'=>'Update CasoParticular','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete CasoParticular','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CasoParticular','url'=>array('admin')),
);
?>

<h1>View CasoParticular #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
		'nombre_corto',
		'codigo',
		'descripcion',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
),
)); ?>
