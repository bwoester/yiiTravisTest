<?php

// change the following paths if necessary
$yiit = dirname(__FILE__) . '/../vendor/yii/framework/yiit.php';
if (!file_exists($yiit))
{
  echo "failed to find '$yiit', falling back to local dev environment...";
  $yiit = 'yii/tags/1.1.10/framework/yiit.php';
}

$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
// require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
