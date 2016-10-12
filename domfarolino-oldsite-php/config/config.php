<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configuration for: Project URL
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */

//define('URL', 'localhost/WORK/site/hfdmvc/');

//define('CONTROLLERS', "{$_SERVER['DOCUMENT_ROOT']}/WORK/site/hfdmvc/controllers");
//define('VIEWS', "{$_SERVER['DOCUMENT_ROOT']}/WORK/site/hfdmvc/views");
//define('MODELS', "{$_SERVER['DOCUMENT_ROOT']}/WORK/site/hfdmvc/models");
//define('LIBS', "{$_SERVER['DOCUMENT_ROOT']}/WORK/site/hfdmvc/libs");

//Production
define('URL', DIRECTORY_SEPARATOR);
define('SITE_NAME', 'domfarolino');

define('CONTROLLERS', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.SITE_NAME.DIRECTORY_SEPARATOR.'controllers');
define('VIEWS', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.SITE_NAME.DIRECTORY_SEPARATOR.'views');
define('MODELS', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.SITE_NAME.DIRECTORY_SEPARATOR.'models');
define('LIBS', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.SITE_NAME.DIRECTORY_SEPARATOR.'libs');


/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_HOST', 'localhost');
define('DB_TYPE', 'mysql');
define('DB_NAME', 'populate');
define('DB_USER', 'root');
define('DB_PASS', '');

/**
 * Database configuration
 * Should be tampered with when a complete users model is formed
 */

define('AUTH_SALT','r_`<6kKy}(woM~be17l9.gIa#Bl5)YRd8.l2WPo20tUjpPL1o)n4X{N$Z<!Y60g$.9CucM21py3(=W4nqO6S8f.ZI@9LtXkFv:CZ;r61]kP}F507=E9i4c|r');
define('NONCE_SALT',',q8#1252l(57Y5P#X>7j,3DJ234~NPi6n9pyTs|k:6r5aiT]jL|KQhE2-1h3O7Ln|"It&gSJcEYRZTNFg[2NH.edQQ8B7$cIK/2ZE-A79f6Jb4x5NW8`}I0(');
define('SITE_KEY', 'GJxK88t4|4]gMEJ70v)nwf954="2YQXY(|0w=mR.|VY;(Erb/8<8QrC3"f2}4LCF1/LYVC867c5b_B8H^f7dLfv.Z`bHo.|,~R5;|&1dDNv-SJDfo"|YGwJp');
?>