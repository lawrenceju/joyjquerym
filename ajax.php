<?
require('../condb.php');
session_start();
header("content-type:application/json;charset=big5");
//====================================宣告變數

$date_ymd = date("Ymd");
$date_y = date("Y");
	
switch($_POST["action"]){	

	case 'select':			
		$sql="	
		select COMPANY , NUM from TABLE
		";

		$result=mssql_query($sql);


		$outp="";	
			
		while ($row=mssql_fetch_array($result)){ 
		
				if ($outp != "") {$outp .= ",";}	
				$outp .= '{';
				for ($i=0;$i<mssql_num_fields($result);$i++)
				{	
					if ($i <> 0 && $i < mssql_num_fields($result)) 
						{$outp .= ",";}
					$meta = mssql_fetch_field($result,$i);
					//取代欄位內的雙引號 品號欄位有些有輸入雙引號
					$outp .= '"'.$meta->name.'":"'  . str_replace('"','',$row[$i]) . '"';
				}	
				$outp .= '}'; 
		}

		$outp ='['.$outp.']';
		
		echo urldecode($outp);
		
	break;
}
	


?>