<?php

/**
 * This is the model class for table "novidade".
 *
 * The followings are the available columns in table 'novidade':
 * @property string $latitude
 * @property string $longitude
 * @property string $data_novidade
 * @property string $texto
 *
 * The followings are the available model relations:
 * @property Estabelecimento $latitude0
 * @property Estabelecimento $longitude0
 */
class Novidade extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Novidade the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function behaviors() {
        return array(
            'EJsonBehavior'=>array(
                'class'=>'ext.behaviors.EJsonBehavior'
            ),
        );
    }


    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'novidade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('latitude, longitude, data_novidade, texto', 'required'),
			array('latitude, longitude', 'length', 'max'=>45),
			array('texto', 'length', 'max'=>140),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('latitude, longitude, data_novidade, texto', 'safe', 'on'=>'search'),
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
			'latitude0' => array(self::BELONGS_TO, 'Estabelecimento', 'latitude'),
			'longitude0' => array(self::BELONGS_TO, 'Estabelecimento', 'longitude'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'data_novidade' => 'Data Novidade',
			'texto' => 'Texto',
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

		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('data_novidade',$this->data_novidade,true);
		$criteria->compare('texto',$this->texto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}