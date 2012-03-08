#!/usr/bin/env php
<?php

set_time_limit(0);

if (isset($argv[1])) {
    $_SERVER['YII_VERSION'] = $argv[1];
}

$vendorDir = dirname(__FILE__);
$deps = array(
  array('yii', 'git://github.com/yiisoft/yii.git', isset($_SERVER['YII_VERSION']) ? $_SERVER['YII_VERSION'] : 'origin/master'),
);

foreach ($deps as $dep) {
  list($name, $url, $rev) = $dep;

  echo "> Installing/Updating $name\n";

  $installDir = $vendorDir.'/'.$name;
  if (!is_dir($installDir)) {
    $return = null;
    system(sprintf('git clone -q %s %s', escapeshellarg($url), escapeshellarg($installDir)), $return);
    if ($return > 0) {
      exit($return);
    }
  }

  $return = null;
  system(sprintf('cd %s && git fetch -q origin && git reset --hard %s', escapeshellarg($installDir), escapeshellarg($rev)), $return);
  if ($return > 0) {
    exit($return);
  }
}