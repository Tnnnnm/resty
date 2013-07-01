<?php

// +-----------------------------------------------------------------------
// | @Copyright (c) 2012 http://t00ls.net.
// +-----------------------------------------------------------------------
// | @Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +-----------------------------------------------------------------------
// | @author: lenush <jnicklasj@gmail.com> qq:707207845
// +-----------------------------------------------------------------------

return array(
    'example' => array(
        'get' => array(
            'filters' => array(
                'id' => array(
                    'trim' => null,
                ),
            ),
            'rules' => array(
                'id' => array(
                    'not_empty' => null,
                    'min_length' => array(2),
                    'digit' => null,
                ),
            ),
        ),
    ),
);
