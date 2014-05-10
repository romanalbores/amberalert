<?php

/**
 * This is the model class for table "data_oficina".
 *
 * The followings are the available columns in table 'data_oficina':
 * @property integer $id
 * @property integer $id_organizacion
 * @property integer $id_region
 * @property string $nombre
 * @property string $nombre_corto
 * @property string $codigo
 * @property string $descripcion
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property CataOrganizacion $idOrganizacion
 * @property CataRegion $idRegion
 * @property OficinaDepartamento[] $oficinaDepartamentos
 * @property OficinaDireccion[] $oficinaDireccions
 */
class Oficina extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Oficina the static model class
     */
    public $organizacion_nombre;
    public $region_nombre;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'data_oficina';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_organizacion, id_region, nombre', 'required'),
            array('id_organizacion, id_region, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 500),
            array('nombre_corto', 'length', 'max' => 25),
            array('codigo', 'length', 'max' => 12),
            array('estatus', 'length', 'max' => 15),
            array('descripcion', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_organizacion, organizacion_nombre, id_region, region_nombre, nombre, nombre_corto, codigo, descripcion, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idOrganizacion' => array(self::BELONGS_TO, 'Organizacion', 'id_organizacion'),
            'idRegion' => array(self::BELONGS_TO, 'Region', 'id_region'),
            'oficinaDepartamentos' => array(self::HAS_MANY, 'OficinaDepartamento', 'id_oficina'),
            'oficinaDireccions' => array(self::HAS_MANY, 'OficinaDireccion', 'id_oficina'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_organizacion' => 'Organizacion',
            'id_region' => 'Region',
            'nombre' => 'Nombre Oficina',
            'nombre_corto' => 'Nombre Corto',
            'codigo' => 'Codigo',
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
        $criteria->alias = "oficina";
        $criteria->compare('id', $this->id);
        $criteria->with = array('idOrganizacion');
        $criteria->addSearchCondition('LOWER(idOrganizacion.nombre)', strtolower($this->id_organizacion));
        $criteria->with = array('idRegion');
        $criteria->addSearchCondition('LOWER(idRegion.nombre)', strtolower($this->id_region));
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('nombre_corto', $this->nombre_corto, true);
        $criteria->compare('codigo', $this->codigo, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('estatus', $this->estatus, true);
        $criteria->compare('registrado_por', $this->registrado_por);
        $criteria->compare('fecha_registro', $this->fecha_registro, true);
        $criteria->compare('modificado_por', $this->modificado_por);
        $criteria->compare('fecha_modificado', $this->fecha_modificado, true);
        $criteria->compare('eliminado', $this->eliminado);
        $criteria->compare('oficina.estatus', 'ACTIVO');
        $criteria->compare('oficina.eliminado', 0);
        $criteria->compare('idOrganizacion.nombre', '%' + $this->organizacion_nombre + '%', true, 'OR');
        $criteria->compare('idRegion.nombre', '%' + $this->region_nombre + '%', true, 'OR');
        return $this->findAll($criteria);
//        return new CActiveDataProvider($this, array(
//            'criteria' => $criteria,
//            'pagination' => array(
//                'pageSize' => 50,
//            ),
//        ));
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

    public function obtenerListaOficinas() {
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

    public function getByIdRegion($id_region) {
        $criteria = new CDbCriteria;
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        $criteria->compare('id_region', $id_region);
        return $this->findAll($criteria);
    }

    public function getByIdOrganizacion($id_organizacion) {
        $criteria = new CDbCriteria;
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        $criteria->compare('id_region', $id_organizacion);
        return $this->findAll($criteria);
    }

}