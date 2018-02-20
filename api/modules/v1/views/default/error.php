<?php
use yii\helpers\Json;

/**
 * @var \yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $message
 */

echo Json::encode([
	'name' => $name,
	'message' => $message,
]);
