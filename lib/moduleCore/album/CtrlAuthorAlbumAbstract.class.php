<?php

abstract class CtrlAuthorAlbumAbstract extends CtrlThemeFourDd {

  protected function id() {
    return $this->req->rq('id');
  }

  protected function getParamActionN() {
    return 0;
  }

  function action_default() {
    $this->d['layout'] = 'cols2';
    $this->d['blocksTpl'] = 'master/profileBlock';
    $this->d['tpl'] = 'bookmarkContent';
    $this->d['contentTpl'] = 'dd/list';
    $ddo = new DdoFour($this->getStrName(), 'siteItems');
    $ddo->gridMode = 'tile';
    $items = $this->items();
    $this->d['user'] = DbModelCore::get('users', $this->req->param(1));
    $this->d['profile'] = (new DdItems('profile'))->getItemByField('userId', $this->req->param(1));
    $items->addF('userId', $this->req->param(1));
    $_items = $items->getItems();
    $this->d['pNums'] = $items->pNums;
    $this->d['html'] = count($_items) ? $ddo->setItems($_items)->els() : '<div class="noItems">нет работ</div>';
  }

  function action_item() {
    $this->d['layout'] = 'cols2';
    $this->d['blocksTpl'] = 'empty';
    $this->d['tpl'] = 'bookmarkContent';
    $this->d['contentTpl'] = 'dd/item';
    $this->d['item'] = $item = $this->items()->getItem($this->req->param(1));
    if (!$item) throw new Error404;
    $this->setPageTitle($item['title'] ?: ' ');
    if ($item['title']) $this->setPageTitle($item['title']);
    $ddo = new Ddo($this->getStrName(), 'siteItem');
    $this->d['html'] = $ddo->setItem($item)->els();
  }

}
