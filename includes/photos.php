<?php
$album_id = isset($_GET['album_id']) ? $_GET['album_id'] : die('Album ID not specified.');
$album_name = isset($_GET['album_name']) ? $_GET['album_name'] : die('Album name not specified.');
$page_title = "{$album_name} Photos";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cyclone Martial Arts | A small team of highly experienced, dedicated martial arts instructors. Committed to providing the highest standard of kickboxing tuition possible in the Rotherham area."/>
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- blue imp gallery -->
    <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="Bootstrap-Image-Gallery-3.1.1/css/bootstrap-image-gallery.min.css">
    <link rel="stylesheet" href="../dist/css/main.css">
</head>
<body>

<div class="container text-center gallery-box">
    <a href="../index.php"><H1 class="home-button" id="home">HOME</H1></a>
    <?php
    echo "<h1 class='section-head'>
    GALLERY</h1>";

    $access_token="328652457541955|5dERDPWIkg3pBj6qomJRhuL9BI8";
    $json_link = "https://graph.facebook.com/v2.3/{$album_id}/photos?fields=source,images,name&access_token={$access_token}";
    $json = file_get_contents($json_link);

    $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

    $photo_count = count($obj['data']);

    for($x=0; $x<$photo_count; $x++){

        // $source = isset($obj['data'][$x]['source']) ? $obj['data'][$x]['source'] : "";
        $source = isset($obj['data'][$x]['images'][0]['source']) ? $obj['data'][$x]['images'][0]['source'] : ""; //hd image
        $name = isset($obj['data'][$x]['name']) ? $obj['data'][$x]['name'] : "";

        echo "<a href='{$source}' title='cycloneGalleryPic' data-gallery>";
        echo "<div class='photo-thumb' style='background: url({$source}) 50% 50% no-repeat; background-size:cover;'>";
        echo "</div>";
        echo "</a>";

    }
    ?>
</div>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-103842250-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-103842250-2');
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="Bootstrap-Image-Gallery-3.1.1/js/bootstrap-image-gallery.min.js"></script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- to make photos full view -->
<script>
    $('#blueimp-gallery').data('useBootstrapModal', false);
    $('#blueimp-gallery').toggleClass('blueimp-gallery-controls', true);
</script>

</body>
</html>