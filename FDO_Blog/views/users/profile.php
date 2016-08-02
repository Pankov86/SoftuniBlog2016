<?php $this->title = "User info"; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<table>
    <tr>
        
        <th>Username</th>
        <th>Full name</th>
        <th>Email</th>
        <th>User group</th>
        <th>Points</th>
        <th>Comments count</th>
        <th>Points given by user</th>
    </tr>

    <?php $user_info = $this->user_info?>
<!--    --><?php //$user_group = $this->user_group?>
<!--    --><?php //$user_activity = $this->user_activity?>
   


        <tr>
            
            <td><?=$user_info['username']?></td>
            <td><?=$user_info['full_name']?></td>
            <td><?=$user_info['email']?></td>
            <td><?=$user_info['group_name']?></td>
            <td><?=$user_info['comments_count']?></td>
            <td><?=$user_info['points']?></td>
            <td><?=$user_info['points_given_by_user']?></td>
            
        </tr>
</table>

