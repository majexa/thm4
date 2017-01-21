<?php

class CtrlThmFourProfile extends CtrlDdCrudUserSingle {

  protected function getStrName() {
    return 'profile';
  }

  function action_json_edit() {
    $tabs =['/profile/json_profile'];
    if (Config::getVarVar('userReg', 'allowEmailEdit')) {
      $tabs[] = '/user/json_editEmail';
    }
//    if (Config::getVarVar('userReg', 'allowPhoneEdit')) {
//      $tabs[] = '/user/json_editPhone';
//    }
    if (Config::getVarVar('userReg', 'allowNameEdit')) {
      $tabs[] = '/user/json_editName';
    }
    $this->processFormTabs($tabs);
  }

  function action_json_profile() {
    $this->json['title'] = 'Профиль';
    parent::action_json_edit();
  }

}