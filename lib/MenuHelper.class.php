<?php

class MenuHelper {

  static function addSelected(Req $req, array &$menu, $menuPathParamsN = 1) {
    $currentParamsPath = '/'.implode('/', array_slice($req->params, 0, $menuPathParamsN));
    foreach ($menu as &$v) {
      if ($currentParamsPath == $v['link']) {
        $v['sel'] = true;
      }
    }
  }

}

