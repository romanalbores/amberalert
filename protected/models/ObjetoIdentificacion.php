<?php

/**
 * This is the model class for table "data_objeto_identificacion".
 *
 * The followings are the available columns in table 'data_objeto_identificacion':
 * @property integer $id
 * @property integer $id_persona_caracteristica
 * @property integer $id_tipo_naturaleza
 * @property string $color
 * @property string $marca
 * @property string $modelo
 * @property string $dimensiones
 * @property string $peso
 * @property string $logotipos
 * @property string $descripcion
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property PersonaCaracteristica $id0
 */
class ObjetoIdentificacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ObjetoIdentificacion the static model class
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
		return 'data_objeto_identificacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_persona_caracteristica, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
			array('id_persona_caracteristica, id_tipo_naturaleza, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('color, marca, modelo, peso', 'length', 'max'=>100),
			array('dimensiones', 'length', 'max'=>200),
			array('logotipos', 'length', 'max'=>500),
			array('estatus', 'length', 'max'=>15),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_persona_caracteristica, id_tipo_naturaleza, color, marca, modelo, dimensiones, peso, logotipos, descripcion, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'PersonaCaracteristica', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_persona_caracteristica' => 'Id Persona Caracteristica',
			'id_tipo_naturaleza' => 'Id Tipo Naturaleza',
			'color' => 'Color',
			'marca' => 'Marca',
			'modelo' => 'Modelo',
			'dimensiones' => 'Dimensiones',
			'peso' => 'Peso',
			'logotipos' => 'Logotipos',
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
		$criteria->compare('id_persona_caracteristica',$this->id_persona_caracteristica);
		$criteria->compare('id_tipo_naturaleza',$this->id_tipo_naturaleza);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('dimensiones',$this->dimensiones,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('logotipos',$this->logotipos,true);
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
        
}