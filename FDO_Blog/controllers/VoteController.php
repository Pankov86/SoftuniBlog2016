<?php

class VoteController extends BaseController
{
    function vote(int $post_id)
    {
        if ($this->isPost){
            $user_id = $_SESSION['user_id'];
            if ($this->model->vote($post_id, $user_id)){
                header("Location: " . APP_ROOT.'/home/view/'.$post_id);
            }
        }
    }
}