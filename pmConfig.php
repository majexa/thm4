<?php

return [
  'vhostAliases' => [
    '/thm/' => '{ngnEnvPath}/thm4/thm/',
  ],
  'afterCmdTttt' => [
    'php {runPath}/run.php site {name} {pmPath}/installers/common',
    'php {runPath}/run.php site {name} thm4/install',
    'php {runPath}/run.php site {name} thm4/install2'
  ]
];