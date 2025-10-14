<?php
include_once 'validation.php';

function post_layout(array $post) {
    $user_avatar = $post['avatar_icon'];
    $user_name = $post['name_and_surname'];
    $post_photo_name = $post['img1'] ? basename($post['img1']) : 'default.png'; 
    $post_text = $post['text'];
    $likes = $post['likes'];
    $date = date("d.m.Y", $post['publication_time']);

    if (!validate_length($post_text, 500) || !validate_date($post['publication_time']) || !validate_type($likes, 'integer')) {
        die("Ошибка валидации данных поста.");
    }

    echo <<<HTML
        <div class="feed-group">
            <div class="above_the_picture">
                <img class="avatar_img" src="/lab8/images/2home/$user_avatar" alt="avatar_photo" />
                <span class="user_name">$user_name</span>
                <button class="main_icons"><img src="/lab8/images/2home/edit_post_icon.png" alt="Edit_post_icon" /></button>    
            </div>
            
            <img src="/lab8/images/2home/$post_photo_name" alt="post_photo" /> 
            
            <div class="under_the_picture">
                <button class="like_btn"><img src="/lab8/images/2home/like_icon.png" alt="Like_icon" />$likes</button>
                <span class="post_description">$post_text</span>
                <button class="more_btn">ещё</button>
                <span class="post_data">$date</span>    
            </div>
        </div>
    HTML;
}
?>