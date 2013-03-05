<?php
ini_set('upload_max_filesize', '10M');
echo ini_get('upload_max_filesize'), ", " , ini_get('post_max_size');
// Show all information, defaults to INFO_ALL
phpinfo();
?>