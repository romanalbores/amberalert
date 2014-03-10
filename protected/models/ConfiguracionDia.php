<?php

/**
 * This is the model class for table "alrt_configuracion_dia".
 *
 * The followings are the available columns in table 'alrt_configuracion_dia':
 * @property integer $id
 * @property integer $id_configuracion
 * @property integer $id_dia
 * @property string $fecha_dia
 * @property integer $configura_hora
 * @property string $estatus
 * @property string $fecha_registro
 * @property integer $registrado_por
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property Configuracion $idConfiguracion
 * @property CataDia $idDia
 * @property ConfiguracionHora[] $configuracionHoras
 */
class ConfiguracionDia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ConfiguracionDia the static model class
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
		return 'alrt_configuracion_dia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_configuracion, id_dia, fecha_registro, registrado_por, modificado_por, fecha_modificado', 'required'),
			array('id_configuracion, id_dia, configura_hora, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('estatus', 'length', 'max'=>15),
			array('fecha_dia', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_configuracion, id_dia, fecha_dia, configura_hora, estatus, fecha_registro, registrado_por, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
			'idConfiguracion' => array(self::BELONGS_TO, 'Configuracion', 'id_configuracion'),
			'idDia' => array(self::BELONGS_TO, 'CataDia', 'id_dia'),
			'configuracionHoras' => array(self::HAS_MANY, 'ConfiguracionHora', 'id_configuracion_dia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_configuracion' => 'Id Configuracion',
			'id_dia' => 'Id Dia',
			'fecha_dia' => 'Fecha Dia',
			'configura_hora' => 'Configura Hora',
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
		$criteria->compare('id_configuracion',$this->id_configuracion);
		$criteria->compare('id_dia',$this->id_dia);
		$criteria->compare('fecha_dia',$this->fecha_dia,true);
		$criteria->compare('configura_hora',$this->configura_hora);
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