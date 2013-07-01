<?php

// +-----------------------------------------------------------------------
// | @Copyright (c) 2012 http://t00ls.net.
// +-----------------------------------------------------------------------
// | @Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +-----------------------------------------------------------------------
// | @author: lenush <jnicklasj@gmail.com> qq:707207845
// +-----------------------------------------------------------------------

class Config_Exception extends Resty_Exception {
    
}

class Resty_Config {

    public static $_data;

    public static function get($key, $default = null) {
        if (isset(self::$_data[$key]))
            return self::$_data[$key];

        $items = explode('.', $key, 2);
        $file = $items[0];
        if (empty(self::$_data[$file])) {
            self::$_data[$file] = include APP_PATH . 'config' . DS . $file . '.php';
        }
        if (empty($items[1]))
            return self::$_data[$file];

        return Arr::path(self::$_data[$file], $items[1]);
    }

    public static function set($key, $val) {
        self::$_data[$key] = $val;
    }

}
