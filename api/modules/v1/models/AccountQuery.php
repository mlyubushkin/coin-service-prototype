<?php

namespace api\modules\v1\models;

/**
 * This is the ActiveQuery class for [[Account]].
 *
 * @see Account
 */
class AccountQuery extends \yii\db\ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return Account[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return Account|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
