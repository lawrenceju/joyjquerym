<?
require('../condb_udf8.php');
session_start();
header("content-type:application/json;charset=UTF-8");
//====================================宣告變數

$id = $_GET['id'];
$date_ymd = date("Ymd");
$date_y = date("Y");

$sql = "
select 單別,單號,單據日期,數量,採購人員,FAX,備註 from TABLE
";

$result = mssql_query($sql);


while ($row = mssql_fetch_row($result)) {
	$arr[] = $row;
}
echo "<div data-role='page' id='two' >";
echo"<div data-role='header'>";
echo"<a href='#' data-role='button' data-icon='back' data-rel='back' data-theme='b' data-inline='true'>Back</a>";
echo"<a href='#pageone' data-role='button' data-icon='home' data-iconpos='right' data-theme='b' data-inline='true'>Home</a>";
echo"<h1>{$id}</h1></div>";


echo"<div data-role='content'>";
echo "<form method='post' id = 'form2' action='updateview.php'";
echo"<ul data-role='listview' data-inset='true'>";

foreach ($arr as $PURTC)
{
	$id2 = $PURTC[0]."-".$PURTC[1];
	$sql2 = "select 單別,單號,序號,品號,數量 from TABLE '";	
	echo "<li data-role='list-divider'>".$PURTC[2]."<span class='ui-li-count'>".$PURTC[3]."</span></li>";
		echo"<li><a>";
		echo"<input data-iconpos='left' name='checkbox[]' id='".$PURTC[0]."-".$PURTC[1]."' value ='".$PURTC[0]."-".$PURTC[1]."' type='checkbox'><label for='".$PURTC[0]."-".$PURTC[1]."'>";
		echo"<h2>".$PURTC[0]."-".$PURTC[1]."</h2>";
		echo"<p>採購人員:<strong>".$PURTC[4]."</strong></p>";
		echo"<p>稅別碼:".$PURTC[5]."</p>";
		echo"<p>備註:".$PURTC[6]."</p>";
		//ECHO"<p>{$sql2}</p>";
		echo"</label></input></a>";
		
		
		echo "<a href='#".rtrim($PURTC[0]).rtrim($PURTC[1])."' data-rel='popup' data-position-to='window' data-inline='true' data-icon='info'></a>
                    <div data-role='popup' id='".rtrim($PURTC[0]).rtrim($PURTC[1])."' class='ui-corner-all' style='padding:10px'>
                        <table><tr><th>序號</th><th>品號</th><th>數量</th></tr>";
		$result2 = mssql_query($sql2);
		$num2 = mssql_num_rows($result2);
		for ($i = 0; $i < $num2; $i++) {
			 echo"<tr>
					<td>".rtrim(mssql_result($result2, $i, '序號'))."</td>
					<td>".rtrim(mssql_result($result2, $i, '品號'))."</td>
					<td>".rtrim(mssql_result($result2, $i, '數量'))."</td>
				</tr>";

		}
        echo"</table><a href='#' data-role='button' data-inline='true' data-rel='back' data-mini='true' data-theme='b'>Close</a></div>";
        echo"</li>";

}	


mssql_free_result($result2); 
echo"</ul>";
echo "<input type='submit' name= 'send' id ='sub' value = '預覽結果'>";
echo"</form>";

echo"</div>";
echo"<div data-role='footer'>";
echo"<h4>Page Footer</h4>";
echo"</div>";
echo"</div>";

?>