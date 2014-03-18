<?php

/**
 * This is the model class for table "cata_direccion".
 *
 * The followings are the available columns in table 'cata_direccion':
 * @property integer $id
 * @property integer $id_asentamiento
 * @property string $calle
 * @property string $colonia
 * @property string $localidad
 * @property string $codigo_postal
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property Localidad $idLocalidad
 */
class Direccion extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Direccion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cata_direccion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
            array('id, id_asentamiento, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly' => true),
            array('calle', 'length', 'max' => 1000),
            array('colonia, localidad', 'length', 'max' => 500),
            array('codigo_postal, estatus', 'length', 'max' => 15),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_asentamiento, calle, colonia, localidad, codigo_postal, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idAsentamiento' => array(self::BELONGS_TO, 'Asentamiento', 'id_asentamiento'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_asentamiento' => 'Asentamiento',
            'calle' => 'Calle',
            'colonia' => 'Colonia',
            'localidad' => 'Localidad',
            'codigo_postal' => 'Codigo Postal',
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
        $criteria->compare('id_asentamiento', $this->id_asentamiento);
        $criteria->compare('calle', $this->calle, true);
        $criteria->compare('colonia', $this->colonia, true);
        $criteria->compare('localidad', $this->localidad, true);
        $criteria->compare('codigo_postal', $this->codigo_postal, true);
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

    public function getById($id) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id=" . $id;
        return $criteria;
    }

    public function obtenerListaDireccion() {
        $criteria = new CDbCriteria();
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return $this->findAll($criteria);
    }

}