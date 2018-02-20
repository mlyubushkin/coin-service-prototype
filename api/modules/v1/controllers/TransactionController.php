<?php
/**
 * TransactionController.php file.
 *
 * @author Mikhail Lyubushkin <atombox@gmail.com>
 * @copyright Copyright @copy; 2018 BelPrime
 * @version 1.0
 */

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * TransactionController class.
 *
 * @author Mikhail Lyubushkin <atombox@gmail.com>
 * @copyright Copyright @copy; 2018 BelPrime
 * @version 1.0
 */
class TransactionController extends ActiveController
{
	public $modelClass = \api\modules\v1\models\Transaction::class;
}
