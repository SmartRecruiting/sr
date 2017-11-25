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
	<th>ステータス</th>
</tr>
<?php
	foreach($data as $key){
		echo "<tr>";
		echo "<td>".$key['has_license']."</td>";
		echo "<td>".$key['work_style']."</td>";
		echo "<td>".$key['term_wish']."</td>";
		echo "<td>".$key['zip_code']."</td>";
		echo "<td>".$key['address_prefecture']."</td>";
		echo "<td>".$key['address_city']."</td>";
		echo "<td>".$key['name']."</td>";
		echo "<td>".$key['birthday_year']."</td>";
		echo "<td>".$key['birthday_month']."</td>";
		echo "<td>".$key['tel']."</td>";
		echo "<td>".$key['email']."</td>";
		echo "<td> </td>";
		echo "</tr>";
	}
//	debug($data);

?>

</table>