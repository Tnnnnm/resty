<?php

// +-----------------------------------------------------------------------
// | @Copyright (c) 2012 http://t00ls.net.
// +-----------------------------------------------------------------------
// | @Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +-----------------------------------------------------------------------
// | @author: lenush <jnicklasj@gmail.com> qq:707207845
// +-----------------------------------------------------------------------

class Route_Exception extends Resty_Exception {
    
}

Class Resty_Route {

    public static function parse() {
        $resources = Config::get('resource');
        $resource = null;
        $resource_uri = parse_url($_SERVER['REQUEST_URI']);
        $resource_uri = str_replace('/index.php', '', $resource_uri['path']);

        $request = Request::instance();
        foreach ($resources as $key => $val) {
            preg_match('#' . $key . '#', $resource_uri, $matches);
            if (!empty($matches[0])) {
                $resource = $val;
                foreach ($matches as $k => $match) {
                    if (!is_int($k)) {
                        $request->set_data($k, $match);
                    }
                }
                break;
            }
        }
        if (!empty($resource)) {
            require_once RESOURCE_PATH . $resource . '.php';
        } else {
            throw new Route_Exception('resource not found: ' . $resource_uri);
        }

        return $resource;
    }

}
