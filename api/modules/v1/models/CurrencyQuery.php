<?php

namespace api\modules\v1\models;

/**
 * This is the ActiveQuery class for [[Currency]].
 *
 * @see Currency
 */
class CurrencyQuery extends \yii\db\ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return Currency[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return Currency|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
