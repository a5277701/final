<?php
	$sql = "SELECT * FROM `student`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>
<form action="adminer/adminerStudent.php" method="post" name="form1">
	<div style="text-align:center">
		<input type="submit" value="學生修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="學生刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="勾選取消"> |
		<input type="button" id="s_add" value="+" >
		<input type="submit" value="學生新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="s_overf">
		<table id="s_table" align="center" border="1">
			<tr align="center">
				<td>學號</td><td>姓名</td><td>密碼</td></tr>
			<?php
			for ($index=0 ; $index < $sn_index ; $index++){
				echo "<tr align='left'>";
				echo "<td><label><input type=checkbox name=chkS[] value='".$arr[$index]['ID']."'/>".$arr[$index]['ID']."</label></td>";
				echo "<td><input type='text' name='name".$arr[$index]['ID']."' value='".$arr[$index]['name']."'/></td>";
				echo "<td><input type='text' name='password".$arr[$index]['ID']."' value='".$arr[$index]['password']."'/></td>";
				echo "</tr>";
			};
			?>
		</table>
	</div>
</form>
<script>
	var s_Id = 1;
	$("#s_add").click(function () {
	$("#s_table").append("<tr align='center' id='s_row"+s_Id+"'><td><input type='button' value='-' onclick='del_s_row("+s_Id+")'><input type='text' name='add_s_ID[]'></td><td><input type='text' name='add_s_name[]'></td><td><input type='text' name='add_s_PW[]'></td></tr>");
		s_Id++;
	});
	function del_s_row(id) {
		$("#s_row"+id).remove();
	}
</script>