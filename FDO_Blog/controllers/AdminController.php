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
        $this->posts = $this->model->getUserPosts($id);
    }

    public function delete($id)
    {
        $id = intval($id);
        $this->user_id = $id;
        $this->user_name = $this->model->getUserNameById($id);

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

    public function deleted_posts()
    {
        $this->posts = $this->model->getDeletedPosts();
    }

    public function restore($post_id)
    {
        $post_id = intval($post_id);
        $post =  $this->model->getDeletedPostByID($post_id);
        $this->post = $post;

        if ($this->isPost){
            $id = $post_id;
            $title = $post['title'];
            $content = $post['content'];
            $user_id = $post['user_id'];
            $username = $post['username'];

            $result = $this->model->restorePost($id, $title, $content, $user_id, $username);

            if ($result){
                $this->addInfoMessage("Post successfully restored.");
                $this->redirect("posts");
            }
            else{
                $this->addErrorMessage("Cannot restore post.");
            }

        }
    }
}