<?php

/**
 * This is the model class for table "alrt_configuracion_dia_hora".
 *
 * The followings are the available columns in table 'alrt_configuracion_dia_hora':
 * @property integer $id
 * @property integer $configuracion_id
 * @property integer $id_dia
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $estatus
 * @property integer $eliminado
 */
class AlrtConfiguracionDiaHora extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alrt_configuracion_dia_hora';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('configuracion_id, id_dia, hora_inicio, hora_fin', 'required'),
			array('configuracion_id, id_dia, eliminado', 'numerical', 'integerOnly'=>true),
			array('estatus', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, configuracion_id, id_dia, hora_inicio, hora_fin, estatus, eliminado', 'safe', 'on'=>'search'),
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
			'configuracion_id' => 'Configuracion',
			'id_dia' => 'Id Dia',
			'hora_inicio' => 'Hora Inicio',
			'hora_fin' => 'Hora Fin',
			'estatus' => 'Estatus',
			'eliminado' => 'Eliminado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('configuracion_id',$this->configuracion_id);
		$criteria->compare('id_dia',$this->id_dia);
		$criteria->compare('hora_inicio',$this->hora_inicio,true);
		$criteria->compare('hora_fin',$this->hora_fin,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('eliminado',$this->eliminado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AlrtConfiguracionDiaHora the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function obtenerHorario() {          
            $sql = "select cata_dia.id as cata_id, cata_dia.nombre_corto as dia, alrt_configuracion_dia_hora.id as alrt_config_dia, alrt_configuracion_dia_hora.hora_inicio, alrt_configuracion_dia_hora.hora_fin
                    from cata_dia, alrt_configuracion_dia_hora
                    where alrt_configuracion_dia_hora.id_dia = cata_dia.id";
            $query = Yii::app()->db->createCommand($sql)->queryAll();
            return $query;
        }
        
        public function obtenerHorarioSecond(){
            $sql = "select alrt_configuracion.id as id_config, alrt_configuracion.nombre, alrt_configuracion.nombre_corto, alrt_configuracion.codigo, alrt_configuracion_dia_hora.id, alrt_configuracion_dia_hora.configuracion_id, alrt_configuracion_dia_hora.hora_inicio, alrt_configuracion_dia_hora.hora_fin, cata_dia.id, cata_dia.nombre 
                    from alrt_configuracion, alrt_configuracion_dia_hora, cata_dia
                    where alrt_configuracion.estatus = 'ACTIVO' AND alrt_configuracion.id = alrt_configuracion_dia_hora.configuracion_id AND alrt_configuracion_dia_hora.id_dia  = cata_dia.id
                    group by alrt_configuracion.id 
                    order by alrt_configuracion.id desc";
            $query = Yii::app()->db->createCommand($sql)->queryAll();
            return $query;
        }
        
        public function ubicacionPoste()
        {
            $sql = "select data_poste.id, data_poste_direccion.id as id_direccion_poste, data_poste.nombre as poste,  data_poste_direccion.id, cata_direccion.calle as calle, cata_direccion.colonia as colonia, cata_direccion.localidad as localidad, cata_zona.nombre as zona
                    from data_poste, data_poste_direccion, cata_zona, cata_direccion
                    where data_poste.id = data_poste_direccion.id_poste and data_poste_direccion.id_zona =  cata_zona.id and data_poste_direccion.id_direccion = cata_direccion.id";
            $query = Yii::app()->db->createCommand($sql)->queryAll();
            return $query;
        }
}
