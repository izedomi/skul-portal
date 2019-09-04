<?php
require_once "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$document = new Dompdf();


$link = mysqli_connect("localhost", "mastersc_skul", "skulportal101?");

mysqli_select_db($link, "mastersc_skulportal");


if((isset($_GET['unique_id'])) && (!empty($_GET['unique_id']))) :

		$unique_id = $_GET['unique_id'];
		$table = $_GET['table'];

		$sql = "SELECT * FROM $table WHERE unique_id = '$unique_id'";
		$query = mysqli_query($link, $sql);
		if(!$query){die("download failed" . mysqli_error($link));}

		$result = mysqli_fetch_array($query);


		$output = '

			<style>

		table {
			font-family: arial, sans-serif;
			border-collapse : collapse;
			width: 70%;
			position: relative;
			left: 15%;
		}
		td, th {
			border: 1px solid #dddddd;
			text-align: center;
			padding: 8px;

		}
		th{
			font-weight: bold;
		}
		tr{
			text-align:center;
		}

		tr:nth-child(even){
			background-color: #dddddd;

		} 
		img{
			width:150px;
			height:150px;
			
		}
		#total{
			color:red;
		}

		.name{
			background-color: white;
			font-weight: bold;
		}
		</style>
		<table>
			
			<tr>
				<td id="img">
					<img src="public/assets/img/a3.jpg" alt="logo"  />
				</td>
			</t>

			<tr class="name">
				
				<td>
					 MYSCHOOLNAME.COM 
				 </td>
			</tr>
			<tr>
				<td>
					<i> 12, suleman strt., Auchi, Edo State </i>
				 </td>
			</tr>

			<tr>

				<td> PAYMENT RECEIPT </td>
			</tr>
			<tr>
			    <td></td>
			 </tr>
			
			
			
		';

		$output .= '
			
			<tr>
				<td>
					RECEIPT NO : '. $result['unique_id'] . ' DATE : '. $result['date'] .'
				</td>
			</tr>
			<tr>
				<td> FULLNAME : '. $result['fullname'] . '</td>
			</tr>
			<tr>
				<td> CLASS : ' . $result['class'] . '( '. $result['wing'] . ' )' . ' </td>
			</tr>
			<tr>
				<td> TERM : ' . $result['term'] . '</td>
			</tr>
			<tr>
				<td>GUARDIAN\'s NAME : '. $result['g_fullname'] . '</td>
			</tr>
			<tr>
				<td> GUARDIAN\'s NO : ' . $result['g_phone'] . '</td>
			</tr>
			<tr>
				<td> PAYMENT CATEGORY : ' . $result['category'] . '</td>
			</tr>
			<tr id="total">
				<td> TOTAL :  #' . $result['total'] . '</td>
			</tr>
		';

	$output .= '</table>' ;

endif;




if((isset($_GET['class'])) && (isset($_GET['term'])) && (isset($_GET['wing'])) && (isset($_GET['table']))):

	// retrieving payment list

    $class = $_GET['class'];
    $term = $_GET['term'];
    $wing = $_GET['wing'];
    $table_name = $_GET['table'];


    if((empty($class))  || (empty($term)) || (empty($wing)) || (empty($table_name))){
      echo "all fields must be selected";
      exit();
    }

    $sql = "SELECT * FROM $table_name WHERE wing = '$wing' AND class='$class' AND term='$term'";
    $query = mysqli_query($link, $sql);

    if(!$query){die("operation failed" . mysqli_error($link));}
  


	$output = '

	  <style>

	table {
	  font-family: arial, sans-serif;
	  border-collapse : collapse;
	  width: 100%;
	 
	}
	td, th {
	  border: 1px solid #dddddd;
	  text-align: center;
	  padding: 8px;

	}
	th{
	  font-weight: bold;
	}
	tr{
	  text-align:center;
	}

	tr:nth-child(even){
	  background-color: #dddddd;

	} 
	img{
	  width:150px;
	  height:150px;
	  
	}
	#total{
	  color:red;
	}

	.name{
	  background-color: white;
	  font-weight: bold;
	}
	</style>
	<table>
	  
	  <tr>
	    <td colspan="4"><img src="public/assets/img/a3.jpg" alt="logo" /></td>
	  </tr>
	  <tr>
    <td colspan="4"> PAYMENT LIST </td>
	  </tr>
	  
	  <tr>
	    <th>S/N</th>
	    <th>NAMES</th>
	    <th>RECIEPT NO</th>
	    <th>DATE</th>
	  </tr>
	    
	';

	$x = 0;
	while($result = mysqli_fetch_array($query)){
	  $output .= '
	   <tr>
	     <td> '. $x++ .'</td>
	     <td><a> '. $result['name'] .'</a></td>
	     <td> '. $result['unique_id'] .'</td>
	     <td> '. $result['date'] .' </td>
	   </tr> 
	   ';
	}

	$output .= '</table>';

endif;


$document->loadHtml($output);

$document->setPaper('A4', 'potrait');

$document->render();

if((isset($_GET['unique_id'])) && (!empty($_GET['unique_id']))) :
	$document->stream($result['fullname'], array("Attachment" => 0));
endif;
if((isset($_GET['class'])) && (isset($_GET['term'])) && (isset($_GET['wing'])) && (isset($_GET['table']))):
	$document->stream('payment list', array("Attachment" => 0));
endif;


?>