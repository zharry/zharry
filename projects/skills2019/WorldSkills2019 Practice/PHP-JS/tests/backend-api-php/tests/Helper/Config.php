<?php

namespace WorldSkills\Trade17\Tests\Helper;

class Config {
    public static $LOGIN_TOKEN = '6fcf38dfc3b9d4c1816cc536efa7dcca';
    public static $USERNAME = 'attendee1';
    public static $PASSWORD = 'attendee1pass';

    /**
     * Get the test configuration.
     * Default values can be overwritten with environment variables.
     */
    public static function get() {
        $url = getenv('URL') ?: 'http://localhost';
        if (substr($url, 0, 4) !== 'http') {
            $url = 'http://' . $url;
        }

        return [
            'db_host' => getenv('DB_HOST') ?: '127.0.0.1',
            'db_user' => getenv('DB_USER') ?: 'root',
            'db_pw' => getenv('DB_PW') ?: '',
            'db_name' => getenv('DB_NAME') ?: 'wsc_t17',
            'url' => $url . ':8000',
        ];
    }
}
