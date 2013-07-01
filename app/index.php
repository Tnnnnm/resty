<?php

// +-----------------------------------------------------------------------
// | @Copyright (c) 2012 http://t00ls.net.
// +-----------------------------------------------------------------------
// | @Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +-----------------------------------------------------------------------
// | @author: lenush <jnicklasj@gmail.com> qq:707207845
// +-----------------------------------------------------------------------

define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', dirname(__FILE__) . DS);
define('SYS_PATH', realpath(dirname(__FILE__) . DS . '..' . DS . 'system') . DS);
define('RESOURCE_PATH', dirname(__FILE__) . DS . 'classes' . DS . 'resource' . DS);

require SYS_PATH . 'classes' . DS . 'resty' . DS . 'core.php';
require SYS_PATH . 'classes' . DS . 'resty.php';

Resty::instance()->init();
try {
    Request::instance()->exec()->output();
} catch (Route_Exception $e) {
    Response::instance()
            ->set_status(404)
            ->set_body(array(
                'error' => 'Resource Not Found',
                'Request' => $_SERVER['REQUEST_URI'],
            ))
            ->output()
    ;
}
