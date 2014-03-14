<?php
$this->breadcrumbs=array(
	'Tipo Vehiculo',
);

$this->menu=array(
array('label'=>'Nuevo','url'=>array('create')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Tipo de Vehiculo</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
