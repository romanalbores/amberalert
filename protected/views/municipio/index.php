<?php
$this->breadcrumbs=array(
	'Municipios',
);

$this->menu=array(
array('label'=>'Create Municipio','url'=>array('create')),
array('label'=>'Manage Municipio','url'=>array('admin')),
);
?>

<h1>Municipios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
