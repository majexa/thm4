<?php

class CtrlThmFourUser extends CtrlUserEdit {

  protected function init() {
    parent::init();
    $this->d['blocksTpl'] = 'empty';
    $this->d['layout'] = 'cols2';
    $this->d['sectionTitle'] = 'профиль';
  }

  function action_default() {
    $this->redirect('/user/editPhone');
  }

}