<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%currency_rate}}".
 *
 * @property int $id
 * @property int $cid
 * @property string $created
 * @property string $updated
 * @property string $date
 * @property string $currency_code_from
 * @property string $currency_code_to
 * @property string $value
 *
 * @property Currency $currencyCodeFrom
 * @property Currency $currencyCodeTo
 */
class CurrencyRate extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return '{{%currency_rate}}';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['cid'], 'default', 'value' => null],
			[['cid'], 'integer'],
			[['created', 'updated', 'date'], 'safe'],
			[['date', 'currency_code_from', 'currency_code_to'], 'required'],
			[['value'], 'number'],
			[['currency_code_from', 'currency_code_to'], 'string', 'max' => 3],
			[['currency_code_from'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_code_from' => 'code']],
			[['currency_code_to'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_code_to' => 'code']],
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
			'date' => 'Date',
			'currency_code_from' => 'Currency Code From',
			'currency_code_to' => 'Currency Code To',
			'value' => 'Value',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCurrencyCodeFrom()
	{
		return $this->hasOne(Currency::className(), ['code' => 'currency_code_from']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCurrencyCodeTo()
	{
		return $this->hasOne(Currency::className(), ['code' => 'currency_code_to']);
	}

	/**
	 * {@inheritdoc}
	 * @return CurrencyRateQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new CurrencyRateQuery(get_called_class());
	}
}
