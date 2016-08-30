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
        $this->user_info = $this->model->getUserInfo($id);
    }

    public function deleteUserAction(int $id)
    {
        $this->authorizeAdmin();
        if ($this->isPost) {
            $result = $this->model->deleteUser($id);
            if ($result) {
                $this->addInfoMessage("User deleted.");
                $this->redirect("admin", "index");
            } else {
                $this->addErrorMessage("Error: cannot delete user.");
            }
        }
        
    }
}