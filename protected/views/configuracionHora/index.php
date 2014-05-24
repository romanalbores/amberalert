<?php
$this->breadcrumbs=array(
	'Configuracion Horas',
);

$this->menu=array(
array('label'=>'Create ConfiguracionHora','url'=>array('create')),
array('label'=>'Manage ConfiguracionHora','url'=>array('admin')),
);
?>

<h1>Configuracion Horas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
