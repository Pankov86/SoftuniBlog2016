<?php

class UsersController extends BaseController
{
    public function resetPass()
    {
        if ($this->isPost){
            if (!empty($_POST['email'])
                && !empty($_POST['new_password'])
                && !empty($_POST['confirm_password'])){

                $email = $_POST['email'];
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];

                // Confirm email
                $isRegistered = $this->model->checkEmail($email);

                // Change password
                $user_id = $this->model->getIdByEmail($email);
                if ($isRegistered){
                        $this->changePasswordWithoutLogin($user_id, $new_password, $confirm_password);
                }
                else{
                    $this->addErrorMessage("This email is not registered.");
                }
            }
        }
    }

    public function pass()
    {

    }

    public function edit()
    {
        $this->authorize();
        $id = $_SESSION['user_id'];
        $this->user_info = $this->model->getInfoForEdit($id);
    }

    function validateEmail(string $email, string $field){
        if (strpos($email, '@')){
            $list = array_map('trim', explode("@", $email));
            $domain = $list[1];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !checkdnsrr($domain, 'MX')){
                $this->setValidationError($field, "E-mail not valid.");
                return false;
            }
            else{
                return true;
            }
        }
        $this->setValidationError($field, "E-mail not valid.");
        return false;
    }

    public function editUserInfo()
    {
        $id = $_SESSION['user_id'];
        $oldInfo = $this->model->getInfoForEdit($id);
        $newFullname = $oldInfo['full_name'];
        $newEmail = $oldInfo['email'];
        $newAboutMe = $oldInfo['About'];


        if (!empty($_POST['newFullname'])|| !empty($_POST['newEmail']) || !empty($_POST['newAboutMe'])){

            if (!empty($_POST['newFullname'])){
                $newFullname = $_POST['newFullname'];
            }
            if (!empty($_POST['newEmail'])) {
                $newEmail = $_POST['newEmail'];

                $this->validateEmail($newEmail, 'newEmail');

            }
            if (!empty($_POST['newAboutMe'])){
                $newAboutMe = $_POST['newAboutMe'];
            }


            if ($this->formValid()){

                $result = $this->model->editUserInfo($id, $newFullname, $newEmail,$newAboutMe);
                if ($result){
                    $this->redirect('users', 'profile');
                    $this->addInfoMessage("Changes saved.");
                }
                else{
                    $this->addErrorMessage("Error: Edit failed.");
                }
            }
        }
    }

    public function changePasswordWithoutLogin($user_id, $new_password, $confirm_password)
    {
            //confirm new password
            if (strlen($new_password) <= 1){
                $this->setValidationError("new_password", "Password too short.");
            }
            if ($new_password != $confirm_password){
                $this->setValidationError("confirm_password", "Passwords do not match.");
            }

            if ($this->formValid()){
                $result = $this->model->changePassword($user_id, $new_password);
                if ($result){
                    $this->addInfoMessage("Password changed.");
                    $this->redirect("users", "login");
                }
            }
        }


    public function changePassword()
    {
        $id = $_SESSION['user_id'];

//        if (empty($_POST['new_password']) &&
//            empty($_POST['confirm_password']) &&
//            empty($_POST['old_password'])){
//            $this->addInfoMessage("Enter values to change the password.");
//        }

        if (!empty($_POST['new_password']) &&
            !empty($_POST['confirm_password']) &&
            !empty($_POST['old_password']))  {
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            //confirm old password
            $isOldPasswordValid = $this->model->isOldPasswordValid($id, $old_password);
            $_SESSION['isvalid'] = $isOldPasswordValid;
            if (!$isOldPasswordValid){
                $this->setValidationError("old_password", "Wrong password.");
                $this->addInfoMessage("Wrong password!");
            }

            //confirm new password
            if (strlen($new_password) <= 1){
                $this->setValidationError("new_password", "Password too short.");
            }
            if ($new_password != $confirm_password){
                $this->setValidationError("confirm_password", "Passwords do not match.");
            }

            if ($this->formValid()){
                $result = $this->model->changePassword($id, $new_password);
                if ($result){
                    $this->addInfoMessage("Password changed.");
                    $this->redirect("users", "profile");
                }
            }
        }
    }

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
            $about = $_POST['About'];

            if (strlen($username) <= 2){
                $this->setValidationError("username", "Username too short.");
                $this->addErrorMessage("Error: Username too short.");
                return;
            }
            if (strlen($password) <= 2){
                $this->setValidationError("password", "Password too short.");
                $this->addErrorMessage("Error: Password too short.");
                return;
            }
            if ($password != $confirm_password){
                $this->setValidationError("confirm_password", "Passwords do not match.");
                $this->addErrorMessage("Error: Passwords do not match.");
                return;
            }

            if ($this->validateEmail($email, 'email')){
                $checkUniqueUsername = $this->model->checkUniqueUsername($username);
                $checkUniqueEmail = $this->model->checkUniqueEmail($email);

                $_SESSION['unique_email'] = $checkUniqueEmail;

                if ($checkUniqueUsername == 0 && $checkUniqueEmail == 0){
                    $userId = $this->model->register(
                        $username, $password, $full_name, $email, $about);
                    if ($userId){
                        //Find id of group 'user'
                        $group = 'user';
                        $group_id = $this->model->getGroupIdByGroupName($group);

                        //Insert user_id and group_id in u_g_interaction table
                        $resultUGI = $this->model->fillUGInteraction($userId, $group_id);

                        //Insert new user in table 'activity'
                        $resultUA = $this->model->createNewUserActivity($userId);

                        if ($resultUGI && $resultUA ){
                            $_SESSION['group_name'] = 'user';
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
                else if($checkUniqueEmail != 0 && $checkUniqueUsername != 0)
                {
                    $this->addErrorMessage("Error: Email already registered.");
                    $this->addErrorMessage("Error: Username already taken.");
                }
                else if ($checkUniqueUsername != 0){
                    $this->addErrorMessage("Error: Username already taken.");
                }
                else if ($checkUniqueEmail != 0){
                    $this->addErrorMessage("Error: Email already registered.");
                }
            }
            else{
                $this->addErrorMessage("Error: Registration failed. Invalid email address.");
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
                $_SESSION['group_name'] = $user_group;
                
                $this->addInfoMessage("Login successful.");
                $this->redirect('');
            }
            else{
                $this->addErrorMessage("Error: Login failed.");
            }
        }
    }

    public function logout()
    {
		session_destroy();
        $this->redirect('');
    }

    public function profile($id = 0)
    {
        //$this->authorize();
        if (!$id){
            $id = $_SESSION['user_id'];
        }
        else{
            $id = intval($id);
        }

        $this->user_info = $this->model->getUserInfo($id);
    }


    public function index()
    {
        $this->authorize();

        if ($_SESSION['user_group'] == "admin"){
            $this->users = $this->model->getAll();
        }
        else{
            $id = $_SESSION['user_id'];
            $this->user = $this->model->getUserInfo($id);
            $this->user['group_name'] = $_SESSION['user_group'];
        }
    }
}
