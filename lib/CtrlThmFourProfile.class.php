<?php

class CtrlThmFourProfile extends CtrlDdCrudUserSingle {

  protected function getStrName() {
    return 'profile';
  }

  function action_json_edit() {
    $this->processFormTabs([
      '/profile/json_profile',
      '/user/json_editPhone'
    ]);
  }

  function action_json_profile() {
    $this->json['title'] = 'Профиль';
    parent::action_json_edit();
  }

}