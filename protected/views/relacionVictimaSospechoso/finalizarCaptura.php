<div id="contenedor-vista-previa">
    <div id="finalizar_foto">
        <?php
            $persona_victima = RelacionVictimaSospechoso::model()->find(RelacionVictimaSospechoso::model()->getById($id_relacion));
            $id_persona_victima = $persona_victima['id_persona_victima'];
            $model_persona  = Persona::model()->find(Persona::model()->getById($id_persona_victima));        
            $model_caracteristicas = PersonaCaracteristica::model()->find(PersonaCaracteristica::model()->getById($id_persona_victima));
            //var_dump($model_caracteristicas);
        ?>
    </div>
    <div class="alert alert-error">
        <h4>Victima</h4>
    </div>
    <div id="finalizar-datos-victima">
        <div id="datos">
            <table class="table table-striped table-hover table-finalizar">
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <!--        <tr>
                <td>Nombre:</td><td><?php echo $model_persona['nombre'] ?></td>
            </tr>
            <tr>
                <td>Apellido Paterno:</td><td><?php echo $model_persona['apellido_paterno'] ?></td>
            </tr>
            <tr>
                <td>Apellido Materno</td><td><?php echo $model_persona['apellido_materno'] ?></td>
            </tr>-->
            <tr class="alert-error">
                <td>Género</td><td><?php echo $model_persona['genero'] ?></td>
            </tr>
            <tr>
                <td>Fecha Nacimiento</td><td><?php echo $model_persona['fecha_nacimiento'] ?></td>
            </tr>
            <tr class="alert-error">
                <td>Fecha Registro</td><td><?php echo $model_persona['fecha_registro'] ?></td>
            </tr>
            <tr>
                <td>Tez</td><td><?php echo $model_caracteristicas['tez'] ?></td>
            </tr>
            <tr class="alert-error">
                <td>Color de piel</td><td><?php echo $model_caracteristicas['color_piel'] ?></td>
            </tr>
            <tr>
                <td>Edad</td><td><?php echo $model_caracteristicas['edad']. " Años"; ?></td>
            </tr>
            <tr class="alert-error">
                <td>Estatura</td><td><?php echo $model_caracteristicas['estatura']. "cm." ?></td>
            </tr>
            <tr>
                <td>Peso</td><td><?php echo $model_caracteristicas['peso']." kg"; ?></td>
            </tr>
            <tr class="alert-error">
                <td>Cabello</td><td><?php echo $model_caracteristicas['cabello'] ?></td>
            </tr>
            <tr>
                <td>Ojos</td><td><?php echo $model_caracteristicas['ojos'] ?></td>
            </tr>
            <tr class="alert-error">
                <td>Complexion</td><td><?php echo $model_caracteristicas['complexion'] ?></td>
            </tr>
            <tr>
                <td>Rasgos Particulares</td><td><?php echo $model_caracteristicas['caracteristicas_peculiares'] ?></td>
            </tr>
            <tr class="alert-error">
                <td><strong>Suceso</td><td><?php echo $suceso ?></strong></td>
            </tr>
        </tbody>        
    </table>
            <?php

            ?>
        </div>    
    </div>
    <div id="finalizar-foto">
        <h3><?php echo $model_persona['nombre']." ".$model_persona['apellido_paterno']." ".$model_persona['apellido_materno']?></h3>
        <?php RelacionVictimaSospechoso::model()->verImagen($id_persona_victima); ?>
    </div>
    <div class="alert alert-block alert-success">
        <h4>Visuliazación de Postes</h4>
    </div>
    <div id="finalizar-ubicacion">
        <table id='table-finalizar-ubicacion' class="table table-striped table-hover table-config">
        <thead>
            <tr>
                <th></th>
                <th>Poste</th>
                <th>Calle</th>
                <th>Colonia</th>
                <th>Localidad</th>
                <th>Zona</th>
            </tr>
        </thead>
        <tbody>

        </tbody>        
    </table>
    </div>

    <div class="alert alert-block alert-info">
        <h4>Horarios de visualización</h4>
    </div>
    <div id="finalizar-horario">
    <!--    <table id="table-finalizar-horario" class="table table-striped table-hover table-config">
        <thead>
            <tr>
                <th></th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>-->
    </div>

    <br>
    <button id="finalizar-btn-atras" class="btn" style="float: left">Atras</button>
    <input type="submit" id="finalizar-btn-continuar" class="btn btn-primary" href="#myModal" style="float: right" value="Finalizar" data-incidencia="<?php echo $id_relacion; ?>">


    <div id="resultado-config"></div>
</div>
<div id="boton-nueva-configuracion" style="display: none;">
    <p>
        Registro guardado, haga click en el siguiente boton para una nueva configuración
    </p>
    <a class="btn btn-info" href="<?php echo Yii::app()->baseUrl;?>/relacionVictimaSospechoso/reporte"> Continuar</a>
</div>