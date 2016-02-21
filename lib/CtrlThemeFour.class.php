<?php

abstract class CtrlThemeFour extends CtrlThemeFourBase {

  abstract protected function themeFourModule();

  /**
   * @return Req
   */
  public function originalReq() {
    return isset($this->router->options['originalReq']) ? $this->router->options['originalReq'] : $this->req;
  }

  protected function extendByBasePath(array $links) {
    foreach ($links as &$v) $v['link'] = $this->d['basePath'].($v['link'] ? '/'.$v['link'] : '');
    return $links;
  }

  protected function init() {
    parent::init();
    Sflm::frontend('css')->addFolder(ThmFourModule::$rootPath.'/'.$this->themeFourModule().'/m/css');
    $this->d['basePath'] = ThmFourModule::$basePaths[$this->themeFourModule()];
    if ($this->d['basePath']) $this->d['basePath'] = '/'.$this->d['basePath'];
    else $this->d['basePath'] = '';
    $this->d['menu'] = Config::getVar('menu', true);
    Sflm::$absBasePaths['thm'] = NGN_ENV_PATH.'/thm4/thm';
    $this->d['layout'] = 'cols1';
  }

  function oProcessForm(DdForm $form) {
    $form->options['deleteFileUrl'] = $this->d['basePath'].'?a=deleteFile';
  }

}