<?php

class ThmFourRouter extends DefaultRouter {

  static function thumbUrl($path, $x, $y) {
    return '/u/thumb/'.dirname($path).'/'.$x.'x'.$y.'/'.basename($path);
  }

  function _getController() {
    if (preg_match('/^u\\/thumb\\/(.+)\\/(\d+)x(\d+)\\/([^\\/]+)/', $this->req->path, $m)) {
      // thumbs generation
      if (file_exists(UPLOAD_PATH.'/'.$m[1].'/'.$m[4])) {
        return new Ctrl404($this, new NoFileException(UPLOAD_PATH.'/'.$m[1].'/'.$m[4]));
      }
      $destPath = UPLOAD_PATH.'/'.Misc::removePrefix('u/', $this->req->path);
      Dir::make(dirname($destPath));
      $file = UPLOAD_PATH.'/'.$m[1].'/'.$m[4];
      if (!file_exists($file)) throw new Error404('Image does not exists');
      (new Image)->resizeAndSave($file, $destPath, $m[2], $m[3]);
      redirect('/'.$this->req->path);
      die();
    }
    $homeProjectControllerClass = 'Ctrl'.ucfirst(PROJECT_KEY).'Home';
    if (!isset($this->req->params[0]) and class_exists($homeProjectControllerClass)) {
      return new $homeProjectControllerClass($this);
    }
    if (isset($this->req->params[0])) {
      if ($this->req->params[0] == 'profile') {
        return new CtrlThmFourProfile($this);
      } elseif ($this->req->params[0] == 'user') {
        return new CtrlThmFourUser($this);
      }
    }
    $class = $this->getControllerClass();
    if ($class == 'CtrlDefault') throw new NotLoggableError('ThmFour: CtrlDefault is not supported');
    return parent::_getController();
  }

}
