<h1>Siguenos en Twitter <?php echo $twitter; ?></h1>
<?php foreach($model as $data): ?>
<h1><?php echo $data->usuario ?>&nbsp;<?php echo $data->clave ?></h1>
<?php endforeach; ?>

