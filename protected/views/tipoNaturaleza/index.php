<?php
$this->breadcrumbs=array(
	'Tipo Naturalezas',
);

$this->menu=array(
array('label'=>'Create TipoNaturaleza','url'=>array('create')),
array('label'=>'Manage TipoNaturaleza','url'=>array('admin')),
);
?>

<h1>Tipo Naturalezas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
