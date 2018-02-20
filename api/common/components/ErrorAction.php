<?php
/**
 * ErrorAction.php file.
 *
 * @author Mikhail Lyubushkin <atombox@gmail.com>
 * @copyright Copyright @copy; 2018 BelPrime
 * @version 1.0
 */

namespace api\common\components;

/**
 * ErrorAction class.
 *
 * @author Mikhail Lyubushkin <atombox@gmail.com>
 * @copyright Copyright @copy; 2018 BelPrime
 * @version 1.0
 */
class ErrorAction extends \yii\web\ErrorAction
{
	public function run()
	{
		\Yii::$app->getResponse()->setStatusCodeByException($this->exception);

		return [
			'success' => false,
			'error' => [
				'name' => $this->getExceptionName(),
				'message' => $this->getExceptionMessage(),
			],
		];
	}
}
