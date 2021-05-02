<?php
require_once('funccopy.php');
$data = array();
$id = filter_input(INPUT_POST,'id');
$sql = "SELECT * FROM `users` WHERE `id` LIKE '%$id%'";
$data = allList($host,$username,$passwd,$dbname,$sql);
//var_dump($data);
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>栄養管理システム</title>
  </head>
  <body>
    <h1>12歳以上の栄養管理</h1>
    <table>
      <tr>
        <td><input type="number"min = "5" max = "100"></td>
      </tr>
      <tr>
        <td>性別:</td>
        <td>男性<input type="checkbox"></td>
        <td>女性<input type="checkbox"></td>
      </tr>
    </table>
    <button type="submit">実行</button>
    <h1>一食の平均摂取カロリーは:</h1>
    <table border = "1">
      <tr>
        <td>アレルギー</td>
        <td>甲殻類<input type="checkbox"></td>
        <td>海鮮<input type="checkbox"></td>
      </tr>
    </table>
    <h1>キーワード検索</h1>
    <form method="post">
      ID: <input type="text" name="id">
      <input type="submit">
    </form>
    <table border = "1">
      <tr>
        <td>id</td>
        <td>料理名</td>
        <td>アレルギー</td>
        <td>カロリー</td>
      </tr>
      <?php foreach($data as $val): ?>
      <tr>
        <td><?php echo $val['id'] ?></td>
        <td><?php echo $val['name'] ?></td>
        <td><?php echo $val['allergy'] ?></td>
        <td><?php echo $val['kcal'] ?></td>
      </tr>
      <?php endforeach ?>
    </table>
  </body>
</html>