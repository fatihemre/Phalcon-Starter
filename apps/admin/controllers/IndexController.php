<?php

namespace PhalconStarter\Admin\Controllers;

use PhalconStarter\Shared\Controllers\ControllerBase;

class IndexController extends ControllerBase {

    public function indexAction(){

        $this->view->setVar('admin', 'Admin Paneli');

    }

    public function notFoundAction(){
        $this->response->setStatusCode(404, "Not Found");
    }

}
