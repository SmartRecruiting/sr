<?php
// src/View/admin.ctp
?>

<h1>管理画面</h1>

<table border="1">
<tr>
	<th>職種</th>
	<th>働き方</th>
	<th>転職期間</th>
	<th>郵便番号</th>
	<th>都道府県</th>
	<th>市区町村</th>
	<th>名前</th>
	<th>出生年</th>
	<th>出生月</th>
	<th>電話番号</th>
	<th>Email</th>
	<th>ステータス1</th>
	<th>ステータス2</th>
	<th>ボタン</th>
</tr>
<?php
	foreach($data as $key => $v){
		if($key['status'] == '0'){
			echo "<tr>";
//			echo "<form id='' action='admin' method='POST'>";
			echo '  <input type="hidden" name="mode" value="update_status">';
			echo '  <input type="hidden" name="cid" value="'.$v.'">';

			echo "<td>".$key['has_license']."</td>";
			echo "<td>".$key['work_style']."</td>";
			if(!empty($key['term_wish'])){
				echo "<td>".$key['term_wish']."</td>";
			}else{
				echo "<td></td>";
			}
			if(!empty($key['zip_code'])){
				echo "<td>".$key['zip_code']."</td>";
			}else{
				echo "<td></td>";
			}
			echo "<td>".$key['address_prefecture']."</td>";
			echo "<td>".$key['address_city']."</td>";
			echo "<td>".$key['name']."</td>";
			echo "<td>".$key['birthday_year']."</td>";
			echo "<td>".$key['birthday_month']."</td>";
			echo "<td>".$key['tel']."</td>";
			if(!empty($key['email'])){
				echo "<td>".$key['email']."</td>";
			}else{
				echo "<td></td>";
			}
			echo "<td>".$key['status']."</td>";
			echo "<td><select name='status'>
<option value='0'>0: 未対応</option>
<option value='1'>1: 電話予定</option>
<option value='2'>2: 電話調整中</option>
<option value='3'>3: 面接調整中</option>
<option value='4'>4: 面接済</option>
<option value='101'>101: 採用</option>
<option value='102'>102: 不採用</option>
</select></td>";
			echo "<td><input type='submit' value='更新''></td>";
//			echo "</form>";
			echo "</tr>";
		}
	}
//	debug($data);

?>

</table>