<?php
$page_title = "GALLERY";
?>

<div class="container gallery-box animated" id="gallery-link">
    <?php

    echo "<div class='col-lg-12 gallery-box animated'>";
    echo "<h1 class='page-header section-head bold text-center'>{$page_title}</h1>";
    echo "</div>";

    $access_token="328652457541955|5dERDPWIkg3pBj6qomJRhuL9BI8";

    $fields="id,name,description,link,cover_photo,count";
    $fb_page_id = "444563555669787";

    $json_link = "https://graph.facebook.com/v2.8/{$fb_page_id}/albums?fields={$fields}&access_token={$access_token}";
    $json = file_get_contents($json_link);

    $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

    $album_count = count($obj['data']);

    for($x=0; $x<$album_count; $x++){

        $id = isset($obj['data'][$x]['id']) ? $obj['data'][$x]['id'] : "";
        $name = isset($obj['data'][$x]['name']) ? $obj['data'][$x]['name'] : "";
        $url_name=urlencode($name);
        $description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";
        $link = isset($obj['data'][$x]['link']) ? $obj['data'][$x]['link'] : "";

        $cover_photo = isset($obj['data'][$x]['cover_photo']['id']) ? $obj['data'][$x]['cover_photo']['id'] : "";

        // use this for older access tokens:
        // $cover_photo = isset($obj['data'][$x]['cover_photo']) ? $obj['data'][$x]['cover_photo'] : "";

        $count = isset($obj['data'][$x]['count']) ? $obj['data'][$x]['count'] : "";

        // if you want to exclude an album, just add the name on the if statement
        if(
            $name =="Cyclone_Website"
        ){

            $show_pictures_link = "includes/photos.php?album_id={$id}&album_name={$name}";

            echo "<div class='col-sm-6 offset-sm-3 '>";
            echo "<a href='{$show_pictures_link}'>";
            echo "<img class='img-responsive gallery-link' src='dist/img/gallerysvg.svg' alt=''>";
            echo "</a>";

            $count_text="Photo";
            if($count>1){ $count_text="Photos"; }
            echo "</div>";
        }
    }
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

