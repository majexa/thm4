<?= $d['tools'] ?>
<? if ($d['pageTitle'] or $d['bookmarks']) { ?>
<div class="bookmarks">
  <? $d['pageTitle'] ? print '<h1>'.$d['pageTitle'].'</h1>' : $this->tpl('cp/links', $d['bookmarks']) ?>
</div>
<? } ?>
<div class="colBody<?= $d['colBodyContent'] ? ' colBodyContent' : '' ?>">
  <?= $d['contentTpl'] ? $this->tpl($d['contentTpl'], $d, false, false, 'contentTpl') : '<div class="colBodyContent">'.$d['html'].'</div>' ?>
</div>

