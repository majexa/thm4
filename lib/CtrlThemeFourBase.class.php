<?php

abstract class CtrlThemeFourBase extends CtrlDefault {

  protected function init() {
    Sflm::frontend('css')->addLib('icons');
    Sflm::frontend('css')->addFolder(NGN_ENV_PATH.'/thm4/thm/css');
    Sflm::frontend('css')->addFolder(WEBROOT_PATH.'/m/css');
    Sflm::frontend('css')->addPath('i/css/common/text.css');
    Sflm::frontend('css')->addPath('i/css/common/dialog.css');
    Sflm::frontend('css')->addPath('i/css/common/form.css');
    Sflm::frontend('css')->addPath('i/css/common/btns.css');
    Sflm::frontend('js')->addLib('m/js/init.js');
    $this->d['layout'] = 'cols2';
    $this->d['blocksTpl'] = 'empty';
    $this->d['footer'] = Config::getVarVar('layoutTexts', 'footer', true);
    if (Auth::get('id')) {
      $this->d['curProfile'] = (new DdItems('profile'))->getItemByField('userId', Auth::get('id'));
    }
  }

  protected function afterAction() {
//    if (isset($this->d['blocksTpl']) and is_string($this->d['blocksTpl'])) {
//      $this->d['blocksTpl'] = new TtTpl($this->tt, $this->d, ['path' => $this->d['blocksTpl']]);
//    }
  }

}