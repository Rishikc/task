 <script>

</script>
<?php       
$path = '/wamp/www/instagram/';
    require_once 'instagram.class.php';
	$tag=$_POST['instagram'];

    $instagram = new Instagram('814711a8545b471cbec145e280508048');


    $media = $instagram->getTagMedia($tag);

    $limit = 50;
$f=1;
    // Set height and width for photos
    $size = '250';

    // Show results
    // Using for loop will cause error if there are less photos than the limit
    foreach(array_slice($media->data, 0, $limit) as $data)
    {
        // Show photo
    //  echo '<p><img src="'.$data->images->thumbnail->url.'" ></p>'; 
    $r='<img src="'.$data->images->thumbnail->url.'" height="'.$size.'" width="'.$size.'">';
	$content = file_get_contents($data->images->thumbnail->url);
	$fp = fopen("instagram/".$f.".jpg", "w");
	fwrite($fp, $content);
	fclose($fp);
	$f++;
	echo $r;
	}
?>