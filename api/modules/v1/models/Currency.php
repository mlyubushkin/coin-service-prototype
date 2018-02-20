<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%currency}}".
 *
 * @property int $id
 * @property int $cid
 * @property string $created
 * @property string $updated
 * @property string $title
 * @property string $code
 *
 * @property Account[] $accounts
 * @property CurrencyRate[] $currencyRates
 * @property CurrencyRate[] $currencyRates0
 */
class Currency extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return '{{%currency}}';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['cid'], 'default', 'value' => null],
			[['cid'], 'integer'],
			[['created', 'updated'], 'safe'],
			[['title', 'code'], 'required'],
			[['title'], 'string', 'max' => 255],
			[['code'], 'string', 'max' => 3],
			[['code'], 'unique'],
			[['title'], 'unique'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'cid' => 'Cid',
			'created' => 'Created',
			'updated' => 'Updated',
			'title' => 'Title',
			'code' => 'Code',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAccounts()
	{
		return $this->hasMany(Account::className(), ['currency_code' => 'code']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCurrencyRates()
	{
		return $this->hasMany(CurrencyRate::className(), ['currency_code_from' => 'code']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCurrencyRates0()
	{
		return $this->hasMany(CurrencyRate::className(), ['currency_code_to' => 'code']);
	}

	/**
	 * {@inheritdoc}
	 * @return CurrencyQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new CurrencyQuery(get_called_class());
	}
}
