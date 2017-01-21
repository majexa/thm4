<?php

class ThmFourModule {

  static $names = [], $basePaths = [], $rootPath;

  static function init($name, $baseRequestParam = null) {
    self::$names[$baseRequestParam] = $name;
    self::$basePaths[$name] = $baseRequestParam;
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
    $projectStructures = false;
    if (file_exists(PROJECT_PATH.'/structures.php')) {
      $projectStructures = require PROJECT_PATH.'/structures.php';
    }
    if (!file_exists($file) and !$projectStructures) return;
    $structures = require $file;
    foreach ($structures as $strName => $strFields) {
      if ($projectStructures and isset($projectStructures[$strName])) {
        $strFields = $projectStructures[$strName];
      }
      DdStructureCore::create($strName, $strFields, false);
    }
  }

}

ThmFourModule::$rootPath = NGN_ENV_PATH.'/thm4-modules/modules';
