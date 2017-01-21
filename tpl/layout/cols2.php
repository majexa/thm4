<div class="span-6 col1">
  <?= is_object($d['blocksTpl']) ? print $d['blocksTpl'] : $this->tpl($d['blocksTpl'], $d, false, false, 'blocks') ?>
</div>
<div class="span-15 col2 last">
  <div class="bColBody">
    <? $this->tpl($d['tpl'], $d) ?>
  </div>
</div>
<div class="clear"></div>
