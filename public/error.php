<?php
# error page for when customer types a wrong url
# or for when they arent logged in 
# and they access try to access account
//    echo "not allowed :P";
//    header('location: index.php');

?>

<script>
window.setTimeout(function() {
    window.location = 'index.php';
  }, 1000);
</script>
<p>not allowed :P</p>