<?php
$this->breadcrumbs=array(
	'Incidencias',
);

$this->menu=array(
array('label'=>'Create Incidencia','url'=>array('create')),
array('label'=>'Manage Incidencia','url'=>array('admin')),
);
?>

<h1>Incidencias</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
