<?php
	$sql = "SELECT * FROM `member`";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
		$arr[$index]=mysql_fetch_array($result);
	};
?>

<form action="html/process/adminer/process_adminerBorrow.php" method="post" name="momber_form">
	<div style="text-align:center">
		<input type="submit" value="會員修改" name="submit" onclick="if(confirm('確定修改?')) return submit();else return false;">
		<input type="submit" value="會員刪除" name="submit" onclick="if(confirm('確定刪除?')) return submit();else return false;">
		<input type="reset" value="reset">
		<span> |</span>
		<input type="button" value="selAll" onclick="selAll();">
		<input type="button" value="unselAll" onclick="unselAll();">
		<input type="button" value="usel" onclick="usel();">
		<span> |</span>
		<input type="button" id="member_add" value="+">
		<input type="submit" value="會員新增" name="submit" onclick="if(confirm('確定新增?')) return submit();else return false;">
		<hr>
	</div>
	<div class="overf" id="member_overf">
		<table id="member_table" align="center" border="1">
			<tr>
				<td><input type='text' placeholder='搜尋會員編號' id='member_search_member_no' name='member_search_member_no' onkeyup='ChangeToBtable()' style='width:95%;background-color:#ffa'></td>
		 		<td><input type='text' placeholder='搜尋會員姓名' id='member_search_member_name' name='member_search_member_name' onkeyup='ChangeToBtable()' style='width:95%;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋會員生日' id='member_search_member_birthday' name='member_search_member_birthday' onkeyup='ChangeToBtable()' style='width:95%;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋會員性別' id='member_search_member_sex' name='member_search_member_sex' onkeyup='ChangeToBtable()' style='width:95%;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋會員信箱' id='member_search_member_e-mail' name='member_search_member_e' onkeyup='ChangeToBtable()' style='width:95%;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋會員電話' id='member_search_member_phone' name='member_search_member_phone' onkeyup='ChangeToBtable()' style='width:90%;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋會員帳號' id='member_search_member_account' name='member_search_member_account' onkeyup='ChangeToBtable()' style='width:95%;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋會員密碼(md5)' id='member_search_member_password' name='member_search_member_password' onkeyup='ChangeToBtable()' style='width:95%;background-color:#ffa'></td>
	 			<td><input type='text' placeholder='搜尋會員密碼' id='member_search_member_pass' name='member_search_member_pass' onkeyup='ChangeToBtable()' style='width:95%;background-color:#ffa'></td>
	 		</tr>
			<tr align="center">
				<td width="10%">編號</td>
				<td width="10%">姓名</td>
				<td width="10%">生日</td>
				<td width="5%">性別</td>
				<td width="20%">信箱</td>
				<td width="10%">電話</td>
				<td width="10%">帳號</td>
				<td width="10%">密碼(md5)</td>
				<td width="10%">密碼</td>
			</tr>
			<?php
			for ($i=0 ; $i < $sn_index ; $i++){
				echo "<tr align='center'>";
				echo "<td><label><input type=checkbox name=chkB[] value='".$arr[$i]['member_no']."'/>".$arr[$i]['member_no']."</label></td>";
				echo "<td><input type='text' style='width:95%' name='member_name".$arr[$i]['member_no']."' value='".$arr[$i]['member_name']."'/></td>";
				echo "<td><input type='text' style='width:95%'name='member_birthday".$arr[$i]['member_no']."' value='".$arr[$i]['member_birthday']."'/></td>";
				echo "<td><input type='text' style='width:95%'name='member_sex".$arr[$i]['member_no']."' value='".$arr[$i]['member_sex']."'/></td>";
				echo "<td><input type='text' style='width:95%'name='member_e".$arr[$i]['member_no']."' value='".$arr[$i]['member_e-mail']."'/></td>";
				echo "<td><input type='text' style='width:95%'name='member_phone".$arr[$i]['member_no']."' value='".$arr[$i]['member_phone']."'/></td>";
				echo "<td><input type='text' style='width:95%'name='member_account".$arr[$i]['member_no']."' value='".$arr[$i]['member_account']."'/></td>";
				echo "<td><input type='text' style='width:95%'name='member_password".$arr[$i]['member_no']."' value='".$arr[$i]['member_password']."'/></td>";
				echo "<td><input type='text' style='width:95%'name='member_pass".$arr[$i]['member_no']."' value='".$arr[$i]['member_pass']."'/></td></tr>";
			}
			?>
		</table>
	</div>
</form>

 <script>
// 	function ChangeToBtable(){
// 		var num = document.getElementById("member_table").rows.length;
// 		 while(num >2) {
// 		  document.getElementById("member_table").deleteRow(-1);
// 		  num--;
// 		 }
// 		$.ajax({
// 			url: "html/process/adminer/process_adminerPageSearch.php",
// 			type: "POST",
// 			data: {
// 					member_no:$('#member_search_member_no').val(),
// 					member_name:$('#member_search_member_name').val(),
// 					member_birthday:$('#member_search_member_birthday').val(),
// 					member_sex:$('#member_search_member_sex').val(),
// 					member_e-mail:$('#member_search_member_e-mail').val(),
// 					member_phone:$('#member_search_member_phone').val(),
// 					member_account:$('#member_search_member_account').val(),
// 					member_password:$('#member_search_member_password').val(),
// 					member_pass:$('#member_search_member_pass').val(),
// 					choose:"member"},
// 			success: function(data){
// 				$('#member_table').append(data);
// 			}
// 		});
// 	};

// 	var b_Id = 1;
// 	$("#member_add").click(function () {
// 		var str="";
// 		str+="<tr align='center' id='member_row"+b_Id+"'>";
// 		str+="<td><input type='button' value='-' onclick='del_member_row("+b_Id+")'>";
// 		str+="<td><select name='add_member_no[]' style='width:70px;'>";
// 		<?php
// 			$str="";
// 			$sql = "SELECT * FROM `member`";
// 			$result = mysql_query($sql);
// 			$str.= "<option value=''>請選擇</option>";
// 			while($stuednt=mysql_fetch_array($result)){
// 				$str.= "<option value='".$stuednt['ID']."'>".$stuednt['ID']."</option>";
// 			}
// 		?>
// 		str+= "<?php echo $str;?>";
// 		str+="<td><select name='add_b_deskNo[]' style='width:70px;'>";
// 		<?php
// 			$str="";
// 			$sql = "SELECT * FROM `desk`";
// 			$result = mysql_query($sql);
// 			$str.= "<option value=''>請選擇</option>";
// 			while($desk=mysql_fetch_array($result)){
// 				$str.= "<option value='".$desk['deskID']."'>".$desk['deskID']."</option>";
// 			}
// 		?>
// 		str+= "<?php echo $str;?>";
// 		str+= "</select></td>";
// 		str+="<td><select name='add_b_timeNo[]' style='width:100px;'>";
// 		<?php
// 			$str="";
// 			$sql = "SELECT * FROM `time`";
// 			$result = mysql_query($sql);
// 			$str.= "<option value=''>請選擇</option>";
// 			while($time=mysql_fetch_array($result)){
// 				$str.= "<option value='".$time['timeID']."'>".$time['time']."</option>";
// 			}
// 		?>
// 		str+= "<?php echo $str;?>";
// 		str+= "</select></td>";
// 		str+="<td><input type='text' name='add_b_date[]' style='width:70px;'></td>";
// 		str+="<td></td>";
// 		str+="<td></td></tr>";
// 		$("#b_table").append(str);
// 		b_Id++;
// 	});
// 	function del_member_row(id) {
// 		$("#member_row"+id).remove();
// 	}]

// 	function selAll(){
// 		//變數checkItem為checkbox的集合
// 		var checkItem = document.getElementsByName("chkB[]");
// 		for(var i=0;i<checkItem.length;i++){
// 			checkItem[i].checked=true;
// 		}
// 	}
// 	function unselAll(){
// 		//變數checkItem為checkbox的集合
// 		var checkItem = document.getElementsByName("chkB[]");
// 		for(var i=0;i<checkItem.length;i++){
// 			checkItem[i].checked=false;
// 		}
// 	}
// 	function usel(){
// 		//變數checkItem為checkbox的集合
// 		var checkItem = document.getElementsByName("chkB[]");
// 		for(var i=0;i<checkItem.length;i++){
// 			checkItem[i].checked=!checkItem[i].checked;
// 		}
// 	}
// </script>