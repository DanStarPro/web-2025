<?php 
    function profile_layout(string $id, array $file_data) {
        $avatar_img = $file_data[$id]["avatar_icon"];
        $name_and_surname = $file_data[$id]["name_and_surname"];
        $description = $file_data[$id]["description"];
        $posts_amount = $file_data[$id]["posts_amount"];
        $imgs = $file_data[$id]["imgs"];

        echo <<<HTML
            <div class="title-group">
                <img class="avatar_img" src="images/3profile/$avatar_img" alt="User_profile_photo" />
                <h2 class="user_name">$name_and_surname</h2>
                <span class="user_description">$description</span><br/>
                <button class="posts_btn">
                    <img src="images/3profile/profile_photo_icon.png" alt="Posts_icon">$posts_amount поста
                </button>   
            </div>
            <div class="images-group">
        HTML;

        foreach ($imgs as $value) {
            echo <<<HTML
                <img class="profile_posts" src="images/3profile/$value" alt="User_photo" />
            HTML;
        }

        echo "</div>";
    }
?>