<?php
$json = file_get_contents('https://www.instagram.com/dijifikir/');
$data = json_decode($json, true);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Son Instagram Postu</title>
</head>
<body>
asdasdasd
<ul>
    <?php foreach($data['graphql']['user']['edge_owner_to_timeline_media']['edges'] as $image){   ?>
        <li>
            <a href="">
                <img src="{{$image['node']['display_url']}}" alt="">
            </a>
        </li>
    <?php } ?>
</ul>

</body>
</html>





