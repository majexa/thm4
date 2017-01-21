<?php

// copy thm4 dummyStructure
$projectName = PROJECT_KEY;
$projFolder = NGN_ENV_PATH.'/projects/'.$projectName;
File::checkExists($projFolder);
$dummyFolder = __DIR__.'/dummyProject';
Dir::copy($dummyFolder, $projFolder, false);

// clear cache
print `pm localProject cc $projectName`;
