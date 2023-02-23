<?php
// If you have your site's root configured to a "public" folder 
// (as in my_website/public/ instead of just my_website/), 
// you can store the images in the my_website/my_images folder 
// with the rest of your app. Then your img tags would reference 
// "my_website/image.php?img_id=55" 
// instead of "my_website/avatar.png", 
// and your image.php script would, after verifying your credentials
// and parsing the id you hand it, return the actual image. 
// That way, the image is only viewable by the proper logged in user.
?>