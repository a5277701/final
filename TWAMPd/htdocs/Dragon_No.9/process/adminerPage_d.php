<?php
	$sql = "SELECT * FROM `desk`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>
<form action="adminer/adminerDesk.php" method="post" name="form2">
	<div style="text-align:center">
		<input type="submit" value="書桌修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="書桌刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="勾選取消"> |
		<input type="button" id="d_add" value="+" >
		<input type="submit" value="書桌新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="d_overf">
		<table id="d_table" align="center" border="1">
			<tr align="center">
				<td>書桌編號</td><td>書桌規格</td><td>書桌區域</td></tr>
			<?php
				for ($index=0 ; $index < $sn_index ; $index++){
					echo "<tr align='center'>";
					echo "<td><label><input type=checkbox name=chkD[] value='".$arr[$index]['deskID']."'/>".$arr[$index]['deskID']."</label></td>";
					echo "<td><select name='deskType".$arr[$index]['deskID']."'>";
				if( $arr[$index]['deskType']=="QQ"){
					echo "<option value='QQ' selected>QQ</option>";
					echo "<option value='AA' >AA</option>";
				}else if($arr[$index]['deskType']=="AA"){
					echo "<option value='QQ' >QQ</option>";
					echo "<option value='AA' selected >AA</option>";
				}
				echo "</select></td>";

				echo "<td><input type='text' name='deskDist".$arr[$index]['deskID']."' value='".$arr[$index]['deskDist']."'/></td>";
				echo "</tr>";
				};
			?>
		</table>
	</div>
</form>
