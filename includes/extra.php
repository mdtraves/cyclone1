$access_token="328652457541955|5dERDPWIkg3pBj6qomJRhuL9BI8";

$fields="id,name,description,link,cover_photo,count";
$fb_page_id = "444563555669787";

$json_link = "https://graph.facebook.com/v2.8/{$fb_page_id}/albums?fields={$fields}&access_token={$access_token}";
$json = file_get_contents($json_link);

$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

$album_count = count($obj['data']);