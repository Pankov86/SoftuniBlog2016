<?php
class AdminController extends BaseController{

    public function getAllUsers(){
        $this->users = $this->model->getAllUsers();
    }
}
