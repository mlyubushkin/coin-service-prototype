<?php

namespace api\modules\v1\models;

/**
 * This is the ActiveQuery class for [[Counterparty]].
 *
 * @see Counterparty
 */
class CounterpartyQuery extends \yii\db\ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return Counterparty[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return Counterparty|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
