<?php
    $file_data = json_decode(file_get_contents("2homeData.json"), true)["users"];

    function post_layout(string $user, array $file_data) {
        $user_avatar = $file_data[$user]["avatar_icon"];
        $user_name = $file_data[$user]["name"];
        $posts = $file_data[$user]["posts"];

        foreach ($posts as $post) {
            $post_photo = $post["img1"];
            $post_text = $post["text"];
            $likes = $post["likes"];
            $date = date("d.m.Y", $post["publication_time"]);

            echo <<<HTML
                <div class="feed-group">
                    <div class="above_the_picture">
                        <img class="avatar_img" src="images/2home/$user_avatar" alt="avatar_photo" />
                        <span class="user_name">$user_name</span>
                        <button class="main_icons"><img src="images/2home/edit_post_icon.png" alt="Edit_post_icon" /></button>    
                    </div>
                    
                    <img src="images/2home/$post_photo" alt="post_photo" />
                    
                    <div class="under_the_picture">
                        <button class="like_btn"><img src="images/2home/like_icon.png" alt="Like_icon" />$likes</button>
                        <span class="post_description">$post_text</span>
                        <button class="more_btn">ещё</button>
                        <span class="post_data">$date</span>    
                    </div>
                </div>
            HTML;
        }
    }
?>