<?php
$this->breadcrumbs=array(
	'Puestos',
);

$this->menu=array(
array('label'=>'Create Puesto','url'=>array('create')),
array('label'=>'Manage Puesto','url'=>array('admin')),
);
?>

<h1>Puestos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
