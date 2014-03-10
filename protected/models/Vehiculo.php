<?php

/**
 * This is the model class for table "data_vehiculo".
 *
 * The followings are the available columns in table 'data_vehiculo':
 * @property integer $id
 * @property integer $id_estado
 * @property integer $id_tipo_vehiculo
 * @property string $color
 * @property string $anio
 * @property string $modelo
 * @property string $placa
 * @property string $codigo_chasis
 * @property string $descripcion
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property PersonaCaracteristicaVehiculo[] $personaCaracteristicaVehiculos
 * @property CataEstado $idEstado
 * @property CataTipoVehiculo $idTipoVehiculo
 */
class Vehiculo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vehiculo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'data_vehiculo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_estado, id_tipo_vehiculo, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
			array('id_estado, id_tipo_vehiculo, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('color', 'length', 'max'=>25),
			array('modelo', 'length', 'max'=>100),
			array('placa, estatus', 'length', 'max'=>15),
			array('codigo_chasis', 'length', 'max'=>45),
			array('anio, descripcion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_estado, id_tipo_vehiculo, color, anio, modelo, placa, codigo_chasis, descripcion, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'personaCaracteristicaVehiculos' => array(self::HAS_MANY, 'PersonaCaracteristicaVehiculo', 'id_vehiculo'),
			'idEstado' => array(self::BELONGS_TO, 'CataEstado', 'id_estado'),
			'idTipoVehiculo' => array(self::BELONGS_TO, 'CataTipoVehiculo', 'id_tipo_vehiculo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_estado' => 'Id Estado',
			'id_tipo_vehiculo' => 'Id Tipo Vehiculo',
			'color' => 'Color',
			'anio' => 'Anio',
			'modelo' => 'Modelo',
			'placa' => 'Placa',
			'codigo_chasis' => 'Codigo Chasis',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_tipo_vehiculo',$this->id_tipo_vehiculo);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('anio',$this->anio,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('placa',$this->placa,true);
		$criteria->compare('codigo_chasis',$this->codigo_chasis,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('registrado_por',$this->registrado_por);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('modificado_por',$this->modificado_por);
		$criteria->compare('fecha_modificado',$this->fecha_modificado,true);
		$criteria->compare('eliminado',$this->eliminado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}