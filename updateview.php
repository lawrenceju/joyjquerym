<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div data-role='page' id='three' >
<div data-role='header'>
<a data-rel="back"  data-role="button" data-icon="back" data-theme="b" data-inline="true">Back</a>
<a href="#pageone" data-role="button" data-icon="home" data-iconpos="right" data-theme="b" data-inline="true">Home</a>
<h1>預覽結果</h1></div>
<div data-role='content'>
<form method='post' id = 'form' action='result.php'>
    <fieldset data-role="controlgroup">
        <legend>Vertical:</legend>
		<?php
			require('../condb_udf8.php');
			session_start();
			$checkbox=$_POST["checkbox"];
			$str = "('".implode("','",$checkbox)."')";
			echo $str;
			
			$date_ymd = date("Ymd");
			$date_y = date("Y");
			
			$sql = "
			select 單別,單號,序號,品號,品名 from TABLE
			";
			
			$result = mssql_query($sql);

			$num = mssql_num_rows($result);
			
			if (!$num) {
				echo 'No records found';
			} 
			else 
			{
			for ($i = 0; $i < $num; $i++) {
				ECHO"<input type='checkbox' name='checkid[]' id='".mssql_result($result, $i, '單別')."-".mssql_result($result, $i, '單號')."-".mssql_result($result, $i, '序號')."' value='".mssql_result($result, $i, '單別')."-".mssql_result($result, $i, '單號')."-".mssql_result($result, $i, '序號')."'>";
				ECHO"<label for='".mssql_result($result, $i, '單別')."-".mssql_result($result, $i, '單號')."-".mssql_result($result, $i, '序號')."'>".mssql_result($result, $i, '單別')."-".mssql_result($result, $i, '單號')."-".mssql_result($result, $i, '序號')."</label>";
				}
			}
			mssql_free_result($result); 
			
			
		?>		

    </fieldset>
	<input type="submit" data-inline="true" value="Submit" data-theme="b">

</form>
</div>
<div data-role='footer'>
<h4>Page Footer</h4>
</div>
</div>
</body>
</html>
