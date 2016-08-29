<?php

class PostsController extends BaseController
{
    
    function onInit()
    {
        $this->authorize();
    }

    function user_posts()
    {
        if ($this->isLoggedInAsAdmin){
            $this->posts = $this->model->getAll();
        }
        else{
            $user_id = $_SESSION['user_id'];
            $this->posts = $this->model->getPostsByUserId($user_id);
        }        
    }
    
    function view($id)
    {
        $this->post = $this->model->getById($id);
    }
    
    function index(){
        $this->posts = $this->model->getAll();
    }

    function create()
    {
        if ($this->isPost){
            //$category = $_POST['category'];
            $category_id = $_POST['category'];

            $title = $_POST['post_title'];
            if (strlen($title) < 1){
                $this->setValidationError("post_title", "Title too short.");
            }
            $content = $_POST['post_content'];
            if (strlen($content) < 1){
                $this->setValidationError("post_content", "Post content is empty.");
            }
            
            $tag_name = $_POST['tag_name'];
            $tag_id = $this->model->findTagByName($tag_name);
            //$_SESSION['tag_name'] = $tag_id['id'];
            
            
            if ($this->formValid()){
                $userId = $_SESSION['user_id'];
                if ($this->model->create($title, $content, $userId, $category_id, $tag_id['id'])){
                    $this->addInfoMessage("Post created.");
                    $this->redirect("posts");
                }
                else{
                    $this->addErrorMessage("Error: cannot create post.");
                }
            }
        }
    }

    public function delete(int $id)
    {
        if ($this->isPost){
            if ($this->model->delete($id)){
                $this->addInfoMessage("Post deleted.");
            }
            else{
                $this->addErrorMessage("Error: cannot delete post.");
            }
            $this->redirect("posts");
        }
        else{
            $post = $this->model->getById($id);
            if (!$post){
                $this->addErrorMessage("Post does not exist.");
                $this->redirect("posts");
            }
            $this->post = $post;
        }
    }

    public function edit(int $id)
    {
        if ($this->isPost){
            $title = $_POST['post_title'];
            if (strlen($title) < 1){
                $this->setValidationError("post_title", "Title too short.");
            }

            $content = $_POST['post_content'];
            if (strlen($content) < 1){
                $this->setValidationError("post_content", "Post content is empty.");
            }

            $user_id = $_SESSION['user_id'];

            $date_edited = date('Y-m-d H:i:s');

            if ($this->formValid()){
                if ($this->model->edit($id, $title, $content, $date_edited, $user_id)){
                    $this->addInfoMessage("Post edited.");
                    $this->redirect("posts");
                }
                else{
                    $this->addErrorMessage("Error: cannot edit post.");
                }
                $this->redirect('posts');
            }
        }
        $post = $this->model->getById($id);
        if (!$post){
            $this->addErrorMessage("Post does not exist.");
            $this->redirect("posts");
        }
        $this->post = $post;
    }
}
