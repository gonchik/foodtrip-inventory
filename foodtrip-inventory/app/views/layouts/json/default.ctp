<?php
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/json; charset=UTF-8");
//header("Content-Type: application/force-download");
//header("Content-Type: application/download");;
echo $content_for_layout;
?>