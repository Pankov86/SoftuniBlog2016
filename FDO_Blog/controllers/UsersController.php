<?php

class UsersController extends BaseController
{
    public function deleteUser($id)
    {        
        if ($this->isPost){
            //delete user's posts
            $this->model->deleteUserPosts($id);
            
            $result = $this->model->makeAdmin($id);

            if ($result) {
                $this->addInfoMessage("User group change successful.");
                $this->redirect('users');
            }
        }
    }
    
    public function makeAdmin($id)
    {
        if ($this->isPost){
            $result = $this->model->makeAdmin($id);

            if ($result) {
                $this->addInfoMessage("User group change successful.");
                $this->redirect('users');
            }
        }
    }

    public function makeUser($id)
    {
        if ($this->isPost){
            $result = $this->model->makeUser($id);

            if ($result) {
                $this->addInfoMessage("User group change successful.");
                $this->redirect('users');
            }
        }
    }



    public function register()
    {
        if ($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];

            if (strlen($username) <= 1){
                $this->setValidationError("username", "Username too short.");
                return;
            }
            if (strlen($password) <= 1){
                $this->setValidationError("password", "Password too short.");
                return;
            }
            if ($password != $confirm_password){
                $this->setValidationError("confirm_password", "Passwords do not match.");
                return;
            }
            $list = array_map('trim', explode("@", $email));
            $domain = $list[1];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !checkdnsrr($domain, 'MX')){
                $this->setValidationError("email", "E-mail not valid.");
            }

            $result = $this->model->checkUniqueUserAndMail($username, $email);
            if ($result == 0){
                $userId = $this->model->register(
                    $username, $password, $full_name, $email);
                if ($userId){
                    //Find id of group 'user'
                    $group = 'user';
                    $group_id = $this->model->getGroupIdByGroupName($group);

                    //Insert user_id and group_id in u_g_interaction table
                    $result = $this->model->fillUGInteraction($userId, $group_id);

                    if ($result){
                        $_SESSION['group_id'] = $group_id;
                        $_SESSION['username'] = $username;
                        $_SESSION['user_id'] = $userId;
                        $this->addInfoMessage("Registration successful.");
                        $this->redirect('');
                    }
                    else{
                        $this->addErrorMessage("Error: Registration failed.");
                    }
                }
                else{
                    $this->addErrorMessage("Error: Registration failed.");
                }
            }
            else{
                $this->addErrorMessage("Error: Username or email already exists.");
            }
        }
    }

    public function login()
    {
        if ($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userId = $this->model->login(
                $username, $password);
            
            if ($userId){
                $user_group = $this->model->getGroupById($userId);
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $userId;
                $_SESSION['user_group'] = $user_group;
                
                $this->addInfoMessage("Login successful.");
                $this->redirect('');
            }
            else{
                $this->addErrorMessage("Error: Login failed.");
            }
        }
    }

    public function profile()
    {
        $this->authorize();
        
        $id = $_SESSION['user_id'];
        $this->user_info = $this->model->getUserInfo($id);
//        $this->user_group = $this->model->getGroupById($id);
//        $this->user_activity = $this->model->getActivity($id);
    }
    
    public function logout()
    {
		session_destroy();
        $this->redirect('');
    }

    public function index()
    {
        $this->authorize();

        if ($_SESSION['user_group'] == "admin"){
            $this->users = $this->model->getAll();
        }
        else{
            $id = $_SESSION['user_id'];
            $this->users = $this->model->getUserInfo($id);
        }
    }
}
