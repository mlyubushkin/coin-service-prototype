<?php

namespace api\modules\v1\models;

/**
 * This is the ActiveQuery class for [[CurrencyRate]].
 *
 * @see CurrencyRate
 */
class CurrencyRateQuery extends \yii\db\ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return CurrencyRate[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return CurrencyRate|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
