<?php
	$sql = "SELECT * FROM `borrowdetail` ORDER BY `borrowNo`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>
<form action="adminer/adminerBorrow.php" method="post" name="form4">
	<div style="text-align:center">
		<input type="submit" value="預借修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="預借刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="勾選取消"> |
		<input type="button" id="b_add" value="+">
		<input type="submit" value="預借新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="b_overf">
		<table id="b_table" align="center" border="1">
			<tr align="center">
				<td>預借編號</td><td>學號</td><td>書桌編號</td><td>時段編號</td><td>日期</td><td>預借時間</td><td>確認</td></tr>
			<?php
			for ($i=0 ; $i < $sn_index ; $i++){
				echo "<tr align='center'>";
				echo "<td><label><input type=checkbox name=chkB[] value='".$arr[$i]['borrowNo']."'/>".$arr[$i]['borrowNo']."</label></td>";
				echo "<td><input type='text' style='width:70px' name='studentID".$arr[$i]['borrowNo']."' value='".$arr[$i]['studentID']."'/></td>";
				echo "<td><input type='text' style='width:70px'name='deskNo".$arr[$i]['borrowNo']."' value='".$arr[$i]['deskNo']."'/></td>";

				echo "<td><select name='timeNo".$arr[$i]['borrowNo']."'>";
				if( $arr[$i]['timeNo']=="A"){
					echo "<option value='A' selected>9:00~12:00</option>";
					echo "<option value='B' >12:00~15:00</option>";
					echo "<option value='C' >15:00~18:00</option>";
				}else if( $arr[$i]['timeNo']=="B"){
					echo "<option value='A' >9:00~12:00</option>";
					echo "<option value='B' selected>12:00~15:00</option>";
					echo "<option value='C' >15:00~18:00</option>";
				}else if( $arr[$i]['timeNo']=="C"){
					echo "<option value='A' >9:00~12:00</option>";
					echo "<option value='B' >12:00~15:00</option>";
					echo "<option value='C' selected>15:00~18:00</option>";
				}
				echo "</select></td>";

				echo "<td><input type='text' style='width:70px'name='date".$arr[$i]['borrowNo']."' value='".$arr[$i]['date']."'/></td>";
				echo "<td><input type='text' style='width:100px'name='datea".$arr[$i]['borrowNo']."' value='".$arr[$i]['datea']."'/></td>";

				echo "<td><select name='check".$arr[$i]['borrowNo']."'>";
				if( $arr[$i]['check']=="not"){
					echo "<option value='ok' >ok</option>";
					echo "<option value='not' selected>not</option>";
				}else if( $arr[$i]['check']=="ok"){
					echo "<option value='ok' selected>ok</option>";
					echo "<option value='not' >not</option>";
				}
					echo "</select></td>";
					echo "</tr>";
				};
			?>
		</table>
	</div>
</form>