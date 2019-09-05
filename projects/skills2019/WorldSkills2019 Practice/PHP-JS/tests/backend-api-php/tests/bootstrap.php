<?php

require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

$config = \WorldSkills\Trade17\Tests\Helper\Config::get();

echo "\n\n";
echo "===   Used configuration:   ===\n";
echo "DB_HOST: ".$config['db_host']."\n";
echo "DB_USER: ".$config['db_user']."\n";
echo "DB_PW:   ".($config['db_pw'] ? str_repeat('*', strlen($config['db_pw'])) : 'no password')."\n";
echo "DB_NAME: ".$config['db_name']."\n";
echo "URL:     ".$config['url']."\n";
echo "\n";
echo "Any of these values can be overwritten with an environment variable.\n";
echo "For example: DB_USER=wsc composer test\n";
echo "===============================\n";
echo "\n\n";
