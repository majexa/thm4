<!DOCTYPE html>
<!--<?= gethostname() ?>-->
<html>
<head>
  <title><?= $d['pageHeadTitle'] ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="/m/img/favicon.ico">
  <link rel="icon" href="data:;base64,=">
  {sflm}
  <script src="/i/js/tiny_mce/tiny_mce.js"></script>
  <script>
    Ngn.authorized = <?= Auth::get('id') ?: 'false' ?>;
    Ngn.isAdmin = <?= Misc::isAdmin() ? 'true' : 'false' ?>;
  </script>
</head>
<body<?= $d['bodyClass'] ? ' class="'.$d['bodyClass'].'"' : '' ?>>
<div class="header">
  <div class="container">
    <? if (!$d['mobile']) { ?>
    <a href="/" class="logo"><i><b></b></i><?= SITE_TITLE ?></a>
    <div class="sectionWrapper"><a href="<?= $d['basePath'] ?>" class="section"><?= $d['sectionTitle'] ?></a></div>
    <div class="menu">
      <? if ($d['menu']) $this->tpl('cp/links', $d['menu']) ?>
    </div>
    <?/*<a href="http://m.<?= SITE_DOMAIN ?>" style="position:absolute;right:150px;top: 0px;"><img title="Мобильная версия" style="width:50%" src="http://www.moneymt.co.uk/wp-content/themes/mau/images/c_header_mobile.png"></a>*/?>
    <? } ?>
    <? if (!$d['mobile']) { ?>
    <div class="personal">
      <? if (Auth::get('id')) { ?>
        <? if ($d['curProfile']['sm_image']) { ?>
          <img src="<?= $d['curProfile']['sm_image'] ?>?<?= $d['curProfile']['dateUpdate_tStamp'] ?>" class="avatar" />
        <? } else { ?>
          <img class="avatar" />
        <? } ?>

        <?/*
        <a href="/user" class="login" id="login"><?= UsersCore::getTitle($id) ?></a>
        */?>

        <div class="login pseudoLink" id="login"><?= UsersCore::getTitle(Auth::get('id')) ?></div>
        <script>
          $('login').addEvent('click', function() {
            new Ngn.Dialog.RequestFormTabs({
            //new Ngn.Dialog.RequestForm({
              width: 400,
              url: '/profile/json_edit',
              onSubmited: function() {
                window.location.reload();
              }
            });
          });
        </script>

        <a href="<?= $d['logoutPath'] ?>?logout=1">Выход</a>
      <? } else { ?>
        <a href="#" class="auth">Войти</a>
      <? } ?>
    </div>
    <? } ?>
  </div>
</div>
<? if ($d['submenu']) { ?>
<div class="container">
  <div class="submenu">
    <? $this->tpl('cp/links', $d['submenu']) ?>
  </div>
</div>
<? } ?>
<div class="container body <?= $d['layout'] ?>">
  <? if ($d['topTpl']) { ?>
    <? $this->tpl($d['topTpl'], $d) ?>
  <? } ?>
  <div class="cTop"></div>
  <div class="pages">
    <div class="cBody">
      <? $this->tpl($d['layout'], $d, false, false, 'layout') ?>
    </div>
  </div>
  <div class="cBottom">
  </div>
</div>

<div class="footer">
  <? $this->tpl('counters', null, true) ?>
  <?= $d['footer'] ?>
</div>

<script>
  Ngn.Btn.addAction('.auth', function() {
    new Ngn.Dialog.Auth();
  });
  //Ngn.Milkbox.add(document.getElements('a.lightbox'));
</script>

</body>

</html>