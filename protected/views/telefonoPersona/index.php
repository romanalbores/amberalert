<?php
$this->breadcrumbs=array(
	'Telefono Personas',
);

$this->menu=array(
array('label'=>'Create TelefonoPersona','url'=>array('create')),
array('label'=>'Manage TelefonoPersona','url'=>array('admin')),
);
?>

<h1>Telefono Personas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
