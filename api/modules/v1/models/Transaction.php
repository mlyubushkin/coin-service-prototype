<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%transaction}}".
 *
 * @property int $id
 * @property int $cid
 * @property string $created
 * @property string $updated
 * @property int $category_id
 * @property int $account_id_from
 * @property int $account_id_to
 * @property string $value_from
 * @property string $value_to
 *
 * @property Account $accountIdFrom
 * @property Account $accountIdTo
 * @property Category $category
 */
class Transaction extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return '{{%transaction}}';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['cid', 'category_id', 'account_id_from', 'account_id_to'], 'default', 'value' => null],
			[['cid', 'category_id', 'account_id_from', 'account_id_to'], 'integer'],
			[['created', 'updated'], 'safe'],
			[['value_from', 'value_to'], 'number'],
			[['account_id_from'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id_from' => 'id']],
			[['account_id_to'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id_to' => 'id']],
			[['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
			'category_id' => 'Category ID',
			'account_id_from' => 'Account Id From',
			'account_id_to' => 'Account Id To',
			'value_from' => 'Value From',
			'value_to' => 'Value To',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAccountIdFrom()
	{
		return $this->hasOne(Account::className(), ['id' => 'account_id_from']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAccountIdTo()
	{
		return $this->hasOne(Account::className(), ['id' => 'account_id_to']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCategory()
	{
		return $this->hasOne(Category::className(), ['id' => 'category_id']);
	}

	/**
	 * {@inheritdoc}
	 * @return TransactionQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new TransactionQuery(get_called_class());
	}
}
