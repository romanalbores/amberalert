<?php

/**
 * This is the model class for table "cata_asentamiento".
 *
 * The followings are the available columns in table 'cata_asentamiento':
 * @property integer $id
 * @property integer $id_localidad
 * @property integer $id_tipo_asentamiento
 * @property string $nombre
 * @property string $nombre_corto
 * @property string $codigo
 * @property string $codigo_postal
 * @property double $no_habitantes
 * @property string $estatus_asentamiento
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 */
class Asentamiento extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Asentamiento the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cata_asentamiento';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
        return array(
            array('id, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
            array('id, id_localidad, id_tipo_asentamiento, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly' => true),
            array('no_habitantes', 'numerical'),
            array('nombre', 'length', 'max' => 500),
            array('nombre_corto', 'length', 'max' => 25),
            array('codigo, codigo_postal, estatus_asentamiento, estatus', 'length', 'max' => 15),
            // The following rule is used by search().
// Please remove those attributes that should not be searched.
            array('id, id_localidad, id_tipo_asentamiento, nombre, nombre_corto, codigo, codigo_postal, no_habitantes, estatus_asentamiento, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_localidad' => 'Localidad',
            'id_tipo_asentamiento' => 'Tipo Asentamiento',
            'nombre' => 'Nombre',
            'nombre_corto' => 'Nombre Corto',
            'codigo' => 'Codigo',
            'codigo_postal' => 'Codigo Postal',
            'no_habitantes' => 'No Habitantes',
            'estatus_asentamiento' => 'Estatus Asentamiento',
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
        $criteria->compare('id_localidad', $this->id_localidad);
        $criteria->compare('id_tipo_asentamiento', $this->id_tipo_asentamiento);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('nombre_corto', $this->nombre_corto, true);
        $criteria->compare('codigo', $this->codigo, true);
        $criteria->compare('codigo_postal', $this->codigo_postal, true);
        $criteria->compare('no_habitantes', $this->no_habitantes);
        $criteria->compare('estatus_asentamiento', $this->estatus_asentamiento, true);
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

    public function obtenerListaLocalidad() {
        $criteria = new CDbCriteria();
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return $this->findAll($criteria);
    }

    public function getById($id) {
        $criteria = new CDbCriteria;
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        $criteria->compare('id', $id);

        return $this->findAll($criteria);
    }

    public function getByIdLocalidad($id_localidad) {
        $criteria = new CDbCriteria;
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        $criteria->compare('id_localidad', $id_localidad);
        return $this->findAll($criteria);
    }

}