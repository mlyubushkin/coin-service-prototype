<?php
/**
 * DefaultController.php file.
 *
 * @author Mikhail Lyubushkin <atombox@gmail.com>
 * @copyright Copyright @copy; 2018 BelPrime
 * @version 1.0
 */

namespace api\modules\v1\controllers;

use yii\helpers\Url;

use api\modules\v1\models;

/**
 * DefaultController class.
 *
 * @author Mikhail Lyubushkin <atombox@gmail.com>
 * @copyright Copyright @copy; 2018 BelPrime
 * @version 1.0
 */
class DefaultController extends \api\common\controllers\DefaultController
{
	public function actionIndex()
	{
		return [
			'date' => date('c'),
			'account' => [
				'url' => Url::to(['account/options']),
				'cid' => models\Account::find()->select(['cid'])->orderBy(['id' => SORT_DESC])->scalar(),
			],
			'category' => [
				'url' => Url::to(['category/options']),
				'cid' => models\Category::find()->select(['cid'])->orderBy(['id' => SORT_DESC])->scalar(),
			],
			'counterparty' => [
				'url' => Url::to(['counterparty/options']),
				'cid' => models\Counterparty::find()->select(['cid'])->orderBy(['id' => SORT_DESC])->scalar(),
			],
			'currency' => [
				'url' => Url::to(['currency/options']),
				'cid' => models\Currency::find()->select(['cid'])->orderBy(['id' => SORT_DESC])->scalar(),
			],
			'currency-rate' => [
				'url' => Url::to(['currency-rate/options']),
				'cid' => models\CurrencyRate::find()->select(['cid'])->orderBy(['id' => SORT_DESC])->scalar(),
			],
			'transaction' => [
				'url' => Url::to(['transaction/options']),
				'cid' => models\Transaction::find()->select(['cid'])->orderBy(['id' => SORT_DESC])->scalar(),
			],
		];
	}
}
