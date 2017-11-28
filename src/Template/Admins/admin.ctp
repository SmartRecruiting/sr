<?php
// src/View/admin.ctp
?>

<h1 style="padding: 0.4em 0.5em;/*文字の上下 左右の余白*/
color: #494949;/*文字色*/
background: #f4f4f4;/*背景色*/
border-left: solid 5px #7db4e6;/*左線*/
border-bottom: solid 3px #d7d7d7;/*下線*/
">管理画面</h1>

<table>
<thead><tr>
	<th>名前</th>
	<th>職種</th>
	<th>働き方</th>
	<th>転職期間</th>
	<th>郵便番号</th>
	<th>都道府県</th>
	<th>市区町村</th>
	<th>出生年</th>
	<th>出生月</th>
	<th>電話番号</th>
	<th>Email</th>
	<!--<th>ステータス1</th>-->
	<th>ステータス</th>
	<th>備考</th>
	<th>ボタン</th>
</tr></thead>
<?php
	foreach($data as $key){
		if($key['status'] == '0' || $key['status'] == '1' || $key['status'] == '2' || $key['status'] == '3' || $key['status'] == '4'){
			echo "<tr>";
		} elseif($key['status'] == '101' || $key['status'] == '102'){
			echo "<tr style='background-color:#B5B5B6;'>";
		}
			echo "<form id='a' action='admin' method='POST'>";
			echo "<input type='hidden' name='mode' value='update_status'>";
			echo "<input type='hidden' name='cid' value='".$key['customerid']."'>";

			echo "<td>".$key['name']."</td>";
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
			echo "<td>".$key['birthday_year']."</td>";
			echo "<td>".$key['birthday_month']."</td>";
			echo "<td>".$key['tel']."</td>";
			if(!empty($key['email'])){
				echo "<td>".$key['email']."</td>";
			}else{
				echo "<td></td>";
			}
			$status = $key['status'];
			//echo "<td>".$status."</td>";
			echo "<td><select name='status'>";

			echo "<option value='0'";
				if($status == '0'){echo " selected";}
			echo ">0: 未対応</option>";

			echo "<option value='1'";
				if($status == '1'){echo " selected";}
			echo ">1: 電話予定</option>";

			echo "<option value='2'";
				if($status == '2'){echo " selected";}
			echo ">2: 電話調整中</option>";

			echo "<option value='3'";
				if($status == '3'){echo " selected";}
			echo ">3: 面接調整中</option>";

			echo "<option value='4'";
				if($status == '4'){echo " selected";}
			echo ">4: 面接済</option>";

			echo "<option value='101'";
				if($status == '101'){echo " selected";}
			echo ">101: 採用</option>";

			echo "<option value='102'";
				if($status == '102'){echo " selected";}
			echo ">102: 不採用</option>";

			echo "</select></td>";
			echo "<td>".$key['comment']."</td>";
			echo "<td><input type='submit' value='更新'></td>";
			echo "</form>";
			echo "</tr>";
	}
//	debug($data);
?>

</table>