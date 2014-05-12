<?php

/**
 * This is the model class for table "alrt_configuracion".
 *
 * The followings are the available columns in table 'alrt_configuracion':
 * @property integer $id
 * @property integer $id_configuracion_dia
 * @property string $nombre
 * @property string $nombre_corto
 * @property string $codigo
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $estatus
 * @property string $fecha_registro
 * @property integer $registrado_por
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property ConfiguracionDia $idConfiguracionDia
 * @property ConfiguracionPoste[] $configuracionPostes
 */
class Configuracion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Configuracion the static model class
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
		return 'alrt_configuracion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fecha_registro, registrado_por, modificado_por, fecha_modificado', 'required'),
			array('id_configuracion_dia, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>500),
			array('nombre_corto', 'length', 'max'=>25),
			array('codigo', 'length', 'max'=>12),
			array('estatus', 'length', 'max'=>15),
			array('descripcion, fecha_inicio, fecha_fin', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_configuracion_dia, nombre, nombre_corto, codigo, descripcion, fecha_inicio, fecha_fin, estatus, fecha_registro, registrado_por, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
			'idConfiguracionDia' => array(self::BELONGS_TO, 'ConfiguracionDia', 'id_configuracion_dia'),
			'configuracionPostes' => array(self::HAS_MANY, 'ConfiguracionPoste', 'id_configuracion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_configuracion_dia' => 'Configuracion Dia',
			'nombre' => 'Nombre',
			'nombre_corto' => 'Nombre Corto',
			'codigo' => 'Codigo',
			'descripcion' => 'Descripcion',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'estatus' => 'Estatus',
			'fecha_registro' => 'Fecha Registro',
			'registrado_por' => 'Registrado Por',
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
		$criteria->compare('id_configuracion_dia',$this->id_configuracion_dia);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nombre_corto',$this->nombre_corto,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('registrado_por',$this->registrado_por);
		$criteria->compare('modificado_por',$this->modificado_por);
		$criteria->compare('fecha_modificado',$this->fecha_modificado,true);
		$criteria->compare('eliminado',$this->eliminado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}