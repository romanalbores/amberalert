<?php
$this->breadcrumbs=array(
	'Puestos',
);

$this->menu=array(
array('label'=>'Nuevo','url'=>array('create')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Puestos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
