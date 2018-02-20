<?php

namespace api\modules\v1\models;

/**
 * This is the ActiveQuery class for [[Transaction]].
 *
 * @see Transaction
 */
class TransactionQuery extends \yii\db\ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return Transaction[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return Transaction|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
