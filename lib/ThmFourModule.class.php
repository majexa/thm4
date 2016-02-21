<?php

class ThmFourModule {

  static $names = [], $basePaths = [], $rootPath;

  static function init($name, $baseParam = null) {
    self::$names[$baseParam] = $name;
    self::$basePaths[$name] = $baseParam;
    Ngn::addBasePath(self::$rootPath.'/'.$name, 3);
  }

  // installer

  static $updated = false;

  static function update() {
    foreach (ThmFourModule::$names as $name) {
      ThmFourModule::install($name);
    }
  }

  static function install($name) {
    $file = self::$rootPath.'/'.$name.'/structures.php';
    if (!file_exists($file)) return;
    $structures = require $file;
    foreach ($structures as $strName => $strFields) {
      DdStructureCore::create($strName, $strFields, false);
    }
  }

}

ThmFourModule::$rootPath = NGN_ENV_PATH.'/thm4-modules/modules';
