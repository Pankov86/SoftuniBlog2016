<?php
class AdminController extends BaseController
{

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

    public function deleteUserAction($id)
    {

        if ($this->isPost) {
            $this->authorizeAdmin();
            $id = intval($id);
            $this->model->deleteUser($id);
            if ($this->model->deleteUser($id)) {
                $this->addInfoMessage("User deleted.");
            } else {
                $this->addErrorMessage("Error: cannot delete user.");
            }
        }
        
    }
}