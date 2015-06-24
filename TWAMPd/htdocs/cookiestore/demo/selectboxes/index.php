<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>selectBoxes 動態下拉式選單</title>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="selectboxes.js"></script>
<script type="text/javascript" src="index.js"></script>
</head>
<body>

<h3>主機 - 類型 - 遊戲（預設值：XBOX360／FPS／刺客聯盟）</h3>

<p>
<select id="select1">
<option value="">請選擇</option>
<?php
    // 資料庫設定
    $host_sql = 'localhost';
    $username_sql = 'root';
    $password_sql = '';
    
    // 聯結資料庫
    $link = mysql_connect($host_sql, $username_sql, $password_sql) or die('無法連結資料庫');
    mysql_select_db('selectboxes', $link);
    mysql_query('SET NAMES UTF8');

    // 動態取得第一階層下拉式選單
    $query = 'SELECT id, name FROM games WHERE levelNum = 1';
    $result = mysql_query($query, $link);
    while ($row = mysql_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>' . "\n";
    }

?>
</select>
<select id="select2">
<option value="">請選擇</option>
</select>
<select id="select3">
<option value="">請選擇</option>
</select>
<!-- 利用隱藏欄位指定預設的選項 -->
<input id="fullIdPath" type="hidden" value="3,8,24" />
</p>

</body>
</html>