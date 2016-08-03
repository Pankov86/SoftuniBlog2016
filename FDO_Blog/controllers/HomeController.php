<?php

class HomeController extends BaseController
{
    function index()
    {
        $this->posts = $this->model->getAllPosts();
        $this->postsSidebar = $this->model->getLatestPosts(5);
    }
	
	function view(int $id)
    {
        $post = $this->model->getPostById($id);
        $comments = $this->model->getPostComments($id);
        //var_dump($comments);
        if ($post){
            $this->post = $post;
            $this->comments = $comments;
        }
        else{
            $this->addErrorMessage('Error: This post does not exist');
            $this->redirect('');
        }
    }

    function addComment($post_id)
    {
        if ($this->isPost){
            if (isset($_POST['content'])) $content = $_POST['content'];
            if ($this->formValid()){
                $user_id = $_SESSION['user_id'];
                if ($this->model->createComment($post_id, $user_id, $content)){
                    $this->addInfoMessage("Comment created.");
                    header("Location: " . APP_ROOT.'/home/view/'.$post_id);
                    //$this->redirect('home', 'view', array($post_id));
                }
                else{
                    $this->addErrorMessage("Error: cannot create comment.");
                }
            }
        }
    }
}
