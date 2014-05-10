<?php
$this->breadcrumbs=array(
	'Asentamientos',
);

$this->menu=array(
array('label'=>'Create Asentamiento','url'=>array('create')),
array('label'=>'Manage Asentamiento','url'=>array('admin')),
);
?>

<h1>Asentamientos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
