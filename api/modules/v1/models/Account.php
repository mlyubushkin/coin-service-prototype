<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property int $id
 * @property int $cid
 * @property string $created
 * @property string $updated
 * @property int $lft
 * @property int $rgt
 * @property int $root
 * @property int $level
 * @property string $title
 * @property int $counterparty_id
 * @property string $description
 * @property string $currency_code
 * @property string $balance
 *
 * @property Counterparty $counterparty
 * @property Currency $currencyCode
 * @property Transaction[] $transactions
 * @property Transaction[] $transactions0
 */
class Account extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return '{{%account}}';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['cid', 'lft', 'rgt', 'root', 'level', 'counterparty_id'], 'default', 'value' => null],
			[['cid', 'lft', 'rgt', 'root', 'level', 'counterparty_id'], 'integer'],
			[['created', 'updated'], 'safe'],
			[['lft', 'rgt', 'level', 'title'], 'required'],
			[['balance'], 'number'],
			[['title', 'description'], 'string', 'max' => 255],
			[['currency_code'], 'string', 'max' => 3],
			[['title'], 'unique'],
			[['counterparty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Counterparty::className(), 'targetAttribute' => ['counterparty_id' => 'id']],
			[['currency_code'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_code' => 'code']],
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
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'root' => 'Root',
			'level' => 'Level',
			'title' => 'Title',
			'counterparty_id' => 'Counterparty ID',
			'description' => 'Description',
			'currency_code' => 'Currency Code',
			'balance' => 'Balance',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCounterparty()
	{
		return $this->hasOne(Counterparty::className(), ['id' => 'counterparty_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCurrencyCode()
	{
		return $this->hasOne(Currency::className(), ['code' => 'currency_code']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTransactions()
	{
		return $this->hasMany(Transaction::className(), ['account_id_from' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTransactions0()
	{
		return $this->hasMany(Transaction::className(), ['account_id_to' => 'id']);
	}

	/**
	 * {@inheritdoc}
	 * @return AccountQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new AccountQuery(get_called_class());
	}
}
