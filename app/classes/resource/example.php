<?php

// +-----------------------------------------------------------------------
// | @Copyright (c) 2012 http://t00ls.net.
// +-----------------------------------------------------------------------
// | @Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +-----------------------------------------------------------------------
// | @author: lenush <jnicklasj@gmail.com> qq:707207845
// +-----------------------------------------------------------------------

class Resource_Example extends Resource {

    public function get() {
        /* set etag
          Response::instance()
          ->if_none_match(md5('hello'))
          ->add_etag(md5('hello'))
          ;
          // */
        $file = APP_PATH . 'files/files.sqlite';
        $db = new Resty_Sqlite3($file);
        $query = $db->get_rows("select * from user");

        //$data = array('uname' => 'fengqin', 'upass' => '667903', 'status' => 1);
        //$insert = $db->insert('user', $data);
        //$update_data = array('uname' => 'huangjian', 'upass' => '987825');
        //$update_where = array('id' => '2');
        //$update = $db->update('user', $update_data, $update_where);
        //echo json_encode(array('kk' => '123456'));
        if ($this->validate()) {
            //$this->_data = $this->get_data();
            $this->_data = $query;
        } else {
            $this->_data = array('error' => implode(',', $this->getErrors()), 'request' => $_SERVER['REQUEST_URI']);
        }
    }

    public function post() {
        $this->_data = array_merge($this->get_data(), array('type' => 'post'));
    }

}
