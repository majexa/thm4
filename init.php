<?php

Ngn::addBasePath(__DIR__, 2);

require __DIR__.'/lib/ThmFourModule.class.php';
require_once CORE_PATH.'/lib/common/Options.class.php';
require_once CORE_PATH.'/lib/common/ArrayAccesseble.class.php';
require_once MORE_PATH.'/lib/core/Req.class.php';
require_once MORE_PATH.'/lib/core/RouterManager.class.php';
require_once MORE_PATH.'/lib/core/Router.class.php';
require_once MORE_PATH.'/lib/common/RouterCommon.class.php';
require_once MORE_PATH.'/lib/common/RouterScripts.class.php';
require __DIR__.'/lib/ThmFourRouterManager.class.php';
O::replaceInjection('RouterManager', 'ThmFourRouterManager');
Sflm::$absBasePaths['thm'] = __DIR__.'/thm';

// default modules
ThmFourModule::init('profile', 'profile');
