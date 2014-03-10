<?php
$this->breadcrumbs=array(
	'Tipo Alertas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoAlerta','url'=>array('index')),
array('label'=>'Manage TipoAlerta','url'=>array('admin')),
);
?>

<h1>Create TipoAlerta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>