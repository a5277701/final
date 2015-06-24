<?php
	$sql = "SELECT * FROM `time`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>
<form action="adminer/adminerTime.php" method="post" name="form3">
	<div style="text-align:center">
		<input type="submit" value="時段修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="時段刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="勾選取消"> |
		<input type="button" id="t_add" value="+">
		<input type="submit" value="時段新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="t_overf">
		<table id="t_table" align="center" border="1">
			<tr align="center">
				<td>時段編號</td><td>時段</td><td>開始時間</td><td>結束時間</td></tr>
			<?php
			for ($index=0 ; $index < $sn_index ; $index++){
				echo "<tr align='center'>";
				echo "<td><label><input type=checkbox name=chkT[] value='".$arr[$index]['timeID']."'/>".$arr[$index]['timeID']."</label></td>";
				echo "<td><input type='text' name='time".$arr[$index]['timeID']."' value='".$arr[$index]['time']."'/></td>";
				echo "<td><input type='text' name='time_start".$arr[$index]['timeID']."' value='".$arr[$index]['time_start']."'/></td>";
				echo "<td><input type='text' name='time_end".$arr[$index]['timeID']."' value='".$arr[$index]['time_end']."'/></td>";
				echo "</tr>";
			};
			?>
		</table>
	</div>
</form>