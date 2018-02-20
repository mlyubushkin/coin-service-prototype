<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
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
 * @property string $description
 *
 * @property Transaction[] $transactions
 */
class Category extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return '{{%category}}';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['cid', 'lft', 'rgt', 'root', 'level'], 'default', 'value' => null],
			[['cid', 'lft', 'rgt', 'root', 'level'], 'integer'],
			[['created', 'updated'], 'safe'],
			[['lft', 'rgt', 'level', 'title'], 'required'],
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
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'root' => 'Root',
			'level' => 'Level',
			'title' => 'Title',
			'description' => 'Description',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTransactions()
	{
		return $this->hasMany(Transaction::className(), ['category_id' => 'id']);
	}

	/**
	 * {@inheritdoc}
	 * @return CategoryQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new CategoryQuery(get_called_class());
	}
}
