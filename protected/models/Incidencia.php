<?php

/**
 * This is the model class for table "alrt_incidencia".
 *
 * The followings are the available columns in table 'alrt_incidencia':
 * @property integer $id
 * @property integer $id_tipo_alerta
 * @property integer $id_caso_particular
 * @property string $fecha_incidencia
 * @property string $suceso
 * @property integer $heridas
 * @property string $descripcion_heridas
 * @property integer $armas
 * @property string $descripcion_armas
 * @property string $lugar_avistamiento_final
 * @property string $persona_acompaniante_final
 * @property string $relacion_acompaniante
 * @property string $relacion_persona_llamada
 * @property string $estatus_suceso
 * @property string $direccion_viaje
 * @property string $descripcion_objeto
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property Configuracion[] $configuracions
 * @property CataCasoParticular $idCasoParticular
 * @property CataTipoAlerta $idTipoAlerta
 * @property IncidenciaDireccion[] $incidenciaDireccions
 * @property IncidenciaTiempo[] $incidenciaTiempos
 */
class Incidencia extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Incidencia the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'alrt_incidencia';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_tipo_alerta, id_caso_particular, armas, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
            array('id_tipo_alerta, id_caso_particular, heridas, armas, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly' => true),
            array('lugar_avistamiento_final, persona_acompaniante_final, relacion_acompaniante, relacion_persona_llamada', 'length', 'max' => 1000),
            array('estatus_suceso, estatus', 'length', 'max' => 15),
            array('fecha_incidencia, suceso, descripcion_heridas, descripcion_armas, direccion_viaje, descripcion_objeto', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_tipo_alerta, id_caso_particular, fecha_incidencia, suceso, heridas, descripcion_heridas, armas, descripcion_armas, lugar_avistamiento_final, persona_acompaniante_final, relacion_acompaniante, relacion_persona_llamada, estatus_suceso, direccion_viaje, descripcion_objeto, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'configuracions' => array(self::HAS_MANY, 'Configuracion', 'id_incidencia'),
            'idCasoParticular' => array(self::BELONGS_TO, 'CataCasoParticular', 'id_caso_particular'),
            'idTipoAlerta' => array(self::BELONGS_TO, 'CataTipoAlerta', 'id_tipo_alerta'),
            'incidenciaDireccions' => array(self::HAS_MANY, 'IncidenciaDireccion', 'id_incidencia'),
            'incidenciaTiempos' => array(self::HAS_MANY, 'IncidenciaTiempo', 'id_incidencia'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_tipo_alerta' => 'Tipo de Alerta',
            'id_caso_particular' => 'Caso Particular',
            'fecha_incidencia' => 'Fecha Incidencia',
            'suceso' => 'Suceso',
            'heridas' => 'Heridas',
            'descripcion_heridas' => 'Descripcion Heridas',
            'armas' => 'Armas',
            'descripcion_armas' => 'Descripcion Armas',
            'lugar_avistamiento_final' => 'Lugar Avistamiento Final',
            'persona_acompaniante_final' => 'Persona Acompaniante Final',
            'relacion_acompaniante' => 'Relacion Acompaniante',
            'relacion_persona_llamada' => 'Relacion Persona Llamada',
            'estatus_suceso' => 'Estatus Suceso',
            'direccion_viaje' => 'Direccion Viaje',
            'descripcion_objeto' => 'Descripcion Objeto',
            'estatus' => 'Estatus',
            'registrado_por' => 'Registrado Por',
            'fecha_registro' => 'Fecha Registro',
            'modificado_por' => 'Modificado Por',
            'fecha_modificado' => 'Fecha Modificado',
            'eliminado' => 'Eliminado',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_tipo_alerta', $this->id_tipo_alerta);
        $criteria->compare('id_caso_particular', $this->id_caso_particular);
        $criteria->compare('fecha_incidencia', $this->fecha_incidencia, true);
        $criteria->compare('suceso', $this->suceso, true);
        $criteria->compare('heridas', $this->heridas);
        $criteria->compare('descripcion_heridas', $this->descripcion_heridas, true);
        $criteria->compare('armas', $this->armas);
        $criteria->compare('descripcion_armas', $this->descripcion_armas, true);
        $criteria->compare('lugar_avistamiento_final', $this->lugar_avistamiento_final, true);
        $criteria->compare('persona_acompaniante_final', $this->persona_acompaniante_final, true);
        $criteria->compare('relacion_acompaniante', $this->relacion_acompaniante, true);
        $criteria->compare('relacion_persona_llamada', $this->relacion_persona_llamada, true);
        $criteria->compare('estatus_suceso', $this->estatus_suceso, true);
        $criteria->compare('direccion_viaje', $this->direccion_viaje, true);
        $criteria->compare('descripcion_objeto', $this->descripcion_objeto, true);
        $criteria->compare('estatus', $this->estatus, true);
        $criteria->compare('registrado_por', $this->registrado_por);
        $criteria->compare('fecha_registro', $this->fecha_registro, true);
        $criteria->compare('modificado_por', $this->modificado_por);
        $criteria->compare('fecha_modificado', $this->fecha_modificado, true);
        $criteria->compare('eliminado', $this->eliminado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors()
    {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'registrado_por',
                'updateAttribute' => 'modificado_por',
                'setUpdateOnCreate' => true,
            ),
            'BlameableBehavior' => array(
                'class' => 'application.components.behaviors.BlameableBehavior',
                'createdByColumn' => 'fecha_registro',
                'updatedByColumn' => 'fecha_modificado',
            ),
        );
    }
    public function getById($id){
        $criteria = new CDbCriteria;
        $criteria->compare('id', $id);
        $criteria->compare('estatus', "ACTIVO");
        $criteria->compare('eliminado', 0);
        return $criteria;
    }
}
