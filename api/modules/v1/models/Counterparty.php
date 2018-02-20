<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%counterparty}}".
 *
 * @property int $id
 * @property int $cid
 * @property string $created
 * @property string $updated
 * @property string $title
 * @property string $description
 *
 * @property Account[] $accounts
 */
class Counterparty extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return '{{%counterparty}}';
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
			[['title'], 'required'],
			[['title', 'description'], 'string', 'max' => 255],
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
			'description' => 'Description',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAccounts()
	{
		return $this->hasMany(Account::className(), ['counterparty_id' => 'id']);
	}

	/**
	 * {@inheritdoc}
	 * @return CounterpartyQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new CounterpartyQuery(get_called_class());
	}
}
