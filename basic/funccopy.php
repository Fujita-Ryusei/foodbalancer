<?php

$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'php';

function allList($host,$username,$passwd,$dbname,$sql){

  //DBへの接続
  $db = mysqli_connect($host,$username,$passwd,$dbname);
  
  if(!$db){
    echo "DB接続エラー";
  }

  mysqli_set_charset($db , "utf8");

  //クエリ送信
  $query = $sql;
  $result = mysqli_query($db , $query);

  $data = array();
  if($result){
    echo'クエリ成功';

    while ($row = mysqli_fetch_array($result)) {
      $data[] = $row;
    }
  }else{
    echo'クエリ失敗';
  }

  //DBの接断
  if( !mysqli_close($db) ) {
    echo "切断に失敗";
  }
  //取得データを戻り値に返す
  return $data;
}

//クエリの実行
?>