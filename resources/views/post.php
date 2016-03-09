<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
////建立数据库连接
//$con = mysql_connect ( "localhost", "homestead", "secret" );
//if (! $con) {
// die ( 'Could not connect: ' . mysql_error () );
//}
////选择查询的数据库
//mysql_select_db ( "testphp", $con );
////设置字符集为UTF-8
//mysql_query ( "set names utf8" );
//$query = "select * from users";
////执行SQL语句
//$result = mysql_query ( $query );
////循环 将查询的数据存入数组
//while ( $row = mysql_fetch_assoc ( $result ) ) {
// $response [] = $row;
//}
////使用Foreach遍历数组 同时使用urlencode处理 含有中文的字段
//foreach ( $response as $key => $value ) {
// $newData[$key] = $value;
// $newData [$key] ['users'] = urlencode ( $value ['users'] );
//}
//echo urldecode ( json_encode ( $newData ) );
//mysql_close ( $con );

echo '成功';

//$users = DB::table('users')->where("name", "=", "Nevic")->get();












?>
