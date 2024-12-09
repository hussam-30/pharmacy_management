<?php

$info = array("host"=>"localhost","user"=>"root","pass"=>"","db"=>"manegment_medicine");

$connect = mysqli_connect($info['host'],$info['user'],$info['pass'],$info['db']);

$select_db = mysqli_select_db($connect,$info['db']);