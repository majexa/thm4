<?php

abstract class CtrlDdCrudUserSingle extends CtrlBase {
  use DdCrudCtrl, DdCrudAuthorCtrl;

  protected $userSingleItemId;

  protected function init() {
    if (!($userId = Auth::get('id'))) throw new Exception('Action allowed only for authorized sessions');
    if (!($userSingleItem = $this->items()->getItemByField('userId', $userId))) {
      $userSingleItem = $this->items()->getItem($this->items()->create([
        'userId' => $userId
      ]));
    }
    $this->userSingleItemId = $userSingleItem['id'];
  }

  protected function id() {
    return $this->userSingleItemId;
  }

  function action_json_new() {
    throw new Exception('creation is not allowed. single user actions');
  }

}