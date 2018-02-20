<?php
/**
 * CategoryController.php file.
 *
 * @author Mikhail Lyubushkin <atombox@gmail.com>
 * @copyright Copyright @copy; 2018 BelPrime
 * @version 1.0
 */

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * CategoryController class.
 *
 * @author Mikhail Lyubushkin <atombox@gmail.com>
 * @copyright Copyright @copy; 2018 BelPrime
 * @version 1.0
 */
class CategoryController extends ActiveController
{
	public $modelClass = \api\modules\v1\models\Category::class;
}
