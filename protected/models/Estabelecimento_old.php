<?php

/**
 * This is the model class for table "estabelecimento".
 *
 * The followings are the available columns in table 'estabelecimento':
 * @property string $latitude
 * @property string $longitude
 * @property integer $id_usuario
 * @property integer $id_categoria
 * @property string $nome
 * @property string $cnpj
 * @property string $endereco
 * @property string $telefone
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario
 * @property Novidade[] $novidades
 * @property Categoria $categoria
 */
class Estabelecimento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Estabelecimento the static model class
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
		return 'estabelecimento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('latitude, longitude, id_usuario, nome, cnpj, endereco, telefone, id_categoria', 'required'),
			array('id_usuario', 'numerical', 'integerOnly'=>true),
			array('latitude, longitude, nome, telefone', 'length', 'max'=>45),
			array('cnpj', 'length', 'max'=>18),
			array('endereco', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('latitude, longitude, id_usuario, nome, cnpj, endereco, telefone, id_categoria', 'safe', 'on'=>'search'),
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
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
			'novidades' => array(self::HAS_MANY, 'Novidade', 'latitude, longitude'),
            'categoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
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
			'id_usuario' => 'Id Usuario',
			'nome' => 'Nome',
			'cnpj' => 'Cnpj',
			'endereco' => 'Endereco',
			'telefone' => 'Telefone',
            'id_categoria' => 'Id Categoria',
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
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('cnpj',$this->cnpj,true);
		$criteria->compare('endereco',$this->endereco,true);
		$criteria->compare('telefone',$this->telefone,true);
        $criteria->compare('id_categoria', $this->id_categoria, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}