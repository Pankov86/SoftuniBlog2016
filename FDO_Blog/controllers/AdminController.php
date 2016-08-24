<?php
class AdminController extends BaseController{

    public function getAllUsers(){
        $this->authorize();
        $this->users = $this->model->getAllUsers();
        $_SESSION['info'] = $this->model->getAllUsers();
    }
}
