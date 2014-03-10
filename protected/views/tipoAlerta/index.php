<?php
$this->breadcrumbs=array(
	'Tipo Alertas',
);

$this->menu=array(
array('label'=>'Create TipoAlerta','url'=>array('create')),
array('label'=>'Manage TipoAlerta','url'=>array('admin')),
);
?>

<h1>Tipo Alertas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
