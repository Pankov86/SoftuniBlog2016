<?php
class AdminController extends BaseController{

    public function index()
    {
        $this->authorizeAdmin();
        $this->users = $this->model->getAllUsers();
    }

    public function details($id)
    {
        $this->authorizeAdmin();
        $id = intval($id);
        $_SESSION['id'] = $id;
        $this->user_info = $this->model->getUserInfo($id);
    }
}
