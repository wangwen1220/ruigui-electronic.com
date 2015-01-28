<?php
include 'cutimg.php';

$imgw = 300;
$imgh = 150;
$imgsrc = 'wp-content/uploads/2013/05/68.jpg';

my_image_resize($imgsrc,$imgsrc.'_'.$imgw.'x'.$imgh.'.jpg',$imgw,$imgh);


?>