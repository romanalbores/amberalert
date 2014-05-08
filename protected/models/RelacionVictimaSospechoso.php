<?php

/**
 * This is the model class for table "data_relacion_victima_sospechoso".
 *
 * The followings are the available columns in table 'data_relacion_victima_sospechoso':
 * @property integer $id
 * @property integer $id_persona_victima
 * @property integer $id_persona_sospechoso
 * @property integer $id_tipo_relacion
 * @property string $fecha_avistamiento
 * @property integer $presuncion_patria_protestad
 * @property integer $disputa_patria_protestad
 * @property integer $intento_previo_sustraccion
 * @property string $fecha_intento
 * @property string $descripcion
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property CataTipoRelacionVictima $idTipoRelacion
 * @property Persona $idPersonaVictima
 */
class RelacionVictimaSospechoso extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return RelacionVictimaSospechoso the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'data_relacion_victima_sospechoso';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_persona_victima', 'required'),
            array('id_persona_victima, id_persona_sospechoso, id_tipo_relacion, presuncion_patria_protestad, disputa_patria_protestad, intento_previo_sustraccion, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly' => true),
            array('estatus', 'length', 'max' => 15),
            array('fecha_avistamiento, fecha_intento, descripcion', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_persona_victima, id_persona_sospechoso, id_tipo_relacion, fecha_avistamiento, presuncion_patria_protestad, disputa_patria_protestad, intento_previo_sustraccion, fecha_intento, descripcion, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idTipoRelacion' => array(self::BELONGS_TO, 'CataTipoRelacionVictima', 'id_tipo_relacion'),
            'idPersonaVictima' => array(self::BELONGS_TO, 'Persona', 'id_persona_victima'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_persona_victima' => 'Id Persona Victima',
            'id_persona_sospechoso' => 'Id Persona Sospechoso',
            'id_tipo_relacion' => 'Id Tipo Relacion',
            'fecha_avistamiento' => 'Fecha Avistamiento',
            'presuncion_patria_protestad' => 'Presuncion Patria Protestad',
            'disputa_patria_protestad' => 'Disputa Patria Protestad',
            'intento_previo_sustraccion' => 'Intento Previo Sustraccion',
            'fecha_intento' => 'Fecha Intento',
            'descripcion' => 'Descripcion',
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
        $criteria->compare('id_persona_victima', $this->id_persona_victima);
        $criteria->compare('id_persona_sospechoso', $this->id_persona_sospechoso);
        $criteria->compare('id_tipo_relacion', $this->id_tipo_relacion);
        $criteria->compare('fecha_avistamiento', $this->fecha_avistamiento, true);
        $criteria->compare('presuncion_patria_protestad', $this->presuncion_patria_protestad);
        $criteria->compare('disputa_patria_protestad', $this->disputa_patria_protestad);
        $criteria->compare('intento_previo_sustraccion', $this->intento_previo_sustraccion);
        $criteria->compare('fecha_intento', $this->fecha_intento, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('estatus', $this->estatus, true);
        $criteria->compare('registrado_por', $this->registrado_por);
        $criteria->compare('fecha_registro', $this->fecha_registro, true);
        $criteria->compare('modificado_por', $this->modificado_por);
        $criteria->compare('fecha_modificado', $this->fecha_modificado, true);
        $criteria->compare('eliminado', $this->eliminado);
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
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

    public function obtenerListaRelacionVictimaSospechoso() {
        $criteria = new CDbCriteria();
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return $this->findAll($criteria);
    }

    public function getById($id) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id=" . $id;
        return $criteria;
    }

    public function getByIdPersonaVictima($id_persona_victima) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_persona_victima=" . $id_persona_victima;
        return $criteria;
    }

    public function getByIdPersonaSospechoso($id_persona_sospechoso) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_persona_sospechoso=" . $id_persona_sospechoso;
        return $criteria;
    }

    public function getByIdTipoRelacion($id_tipo_relacion) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_tipo_relacion=" . $id_tipo_relacion;
        return $criteria;
    }

}
