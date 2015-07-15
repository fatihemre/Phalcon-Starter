<?php

namespace PhalconStarter\Site\Controllers;

use PhalconStarter\Shared\Controllers\ControllerBase;
use PhalconStarter\Shared\Models\Users;

class IndexController extends ControllerBase {

    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction(){

        $users = Users::find();

        if($users)
        {
            $this->view->setVar('users', $users->toArray());
        }
        else
        {
            $this->view->setVar('users', false);
        }

    }

    public function notFoundAction(){
        $this->response->setStatusCode(404, "Not Found");
    }

}
