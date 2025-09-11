<?php

define('TENWEB_ENV', 'TENWEB_ENV_VALUE');


if (!defined('TW_FAILED_LOGIN_ATTEMPTS_COUNT')) {
    define('TW_FAILED_LOGIN_ATTEMPTS_COUNT', 5);
}

// in seconds
if (!defined('TW_LOCKOUT_TIME')) {
    define('TW_LOCKOUT_TIME', 10800);
}

// in seconds
if (!defined('TW_FAILED_ATTEMPTS_TIME')) {
    define('TW_FAILED_ATTEMPTS_TIME', 300);
}

if (!defined('TW_LOCKOUT_MESSAGE')) {
    define('TW_LOCKOUT_MESSAGE', 'You have been locked out due to too many invalid login attempts.');
}