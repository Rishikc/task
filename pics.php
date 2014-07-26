<?php       
$path = '/wamp/www/instagram/';
    require_once 'instagram.class.php';
	if(isset($_POST['submit']))
	{
	$tag=$_POST['instagram'];

    $instagram = new Instagram('814711a8545b471cbec145e280508048');


    $media = $instagram->getTagMedia($tag);

    $limit = 20;
$f=1;
    // Set height and width for photos
    //$size = '250';

    // Show results
    // Using for loop will cause error if there are less photos than the limit
    foreach(array_slice($media->data, 0, $limit) as $data)
    {
        // Show photo
    //  echo '<p><img src="'.$data->images->thumbnail->url.'" ></p>'; 
    $r='<img src="'.$data->images->thumbnail->url.'" >';
	file_put_contents("instagram/".$f.".jpg",$data->images->thumbnail->url); //
	//or copy($image_url, $your_path);
	$f++;
	echo $r;
//	echo $imageinst;
	}
	//echo '<br><button id="more" data-maxid="'.$media->pagination->next_max_id.'" data-tag="'.$tag.'">Load more ...</button>';
	}
	
	
?>