<?php

/**
 * This is the model class for table "cata_telefono".
 *
 * The followings are the available columns in table 'cata_telefono':
 * @property integer $id
 * @property string $numero
 * @property string $compania
 * @property string $tipo
 * @property integer $sms
 * @property integer $internet
 * @property string $descripcion
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 */
class Telefono extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Telefono the static model class
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
		return 'cata_telefono';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
			array('sms, internet, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('numero, compania, tipo, estatus', 'length', 'max'=>15),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, numero, compania, tipo, sms, internet, descripcion, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Numero',
			'compania' => 'Compania',
			'tipo' => 'Tipo',
			'sms' => 'Sms',
			'internet' => 'Internet',
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('compania',$this->compania,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('sms',$this->sms);
		$criteria->compare('internet',$this->internet);
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