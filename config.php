<?php

$hostname_localhost ="localhost"; // ????? ??? ??
$database_localhost ="serv"; // ??? ????? ???????? ???? ???? ????????
$username_localhost ="root"; // ??? ?????? ??????? ???? ????? ????? ??????? ?? ??? ???????? ??????? ???????
$password_localhost =""; // ??? ?????? ??????? ???? ???? ?????? ?????? ???????? ?? ?????? ?????? ???????? ??? ??? ???????? ??????
$localhost = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
mysqli_select_db($localhost,'wjba');

?>