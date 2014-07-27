 <script>

</script>
<?php       
$path = '/wamp/www/instagram/';//set your path where you want the photos :)
    require_once 'instagram.class.php';
	$tag=$_POST['instagram'];

    $instagram = new Instagram('814711a8545b471cbec145e280508048');

	
    $media = $instagram->getTagMedia($tag);

    $limit = 50;//tried it but still instagram allows on;y 20 pics or lower than 20 :(
	$f=1;
    // Set height and width for photos
    $size = '250';

    // gets the pic with the required hashtag 
    foreach(array_slice($media->data, 0, $limit) as $data)
    {
        // Show photo since $data->images->thumbnail->url gives the url of the photos present with the required hashtag
    $r='<img src="'.$data->images->thumbnail->url.'" height="'.$size.'" width="'.$size.'">';
	//now it stores into the folder named instagram in the path you have given
	$content = file_get_contents($data->images->thumbnail->url);
	$fp = fopen("instagram/".$f.".jpg", "w");
	fwrite($fp, $content);
	fclose($fp);
	$f++;
	echo $r;
	}
?>