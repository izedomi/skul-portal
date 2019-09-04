<?php

  require_once ("../dompdf/autoload.inc.php");

  use Dompdf\Dompdf;

  $document = new Dompdf();

     $link = mysqli_connect("localhost", "wwicscho_root", "izedomi101?");

    mysqli_select_db($link, "wwicscho_payment");

  
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
  

  ?>

  <?php



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
    <td colspan="4"><img src="..public/assets/img/a3.jpg" alt="logo" /></td>
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

$document->loadHtml($output);

$document->setPaper('A4', 'potrait');

$document->render();

$document->stream("payment list", array("Attachment" => 0));

//<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
 //<link rel="icon" type="image/gif" href="animated_favicon1.gif" />
 //<link rel="shortcut icon" href="favicon.ico" />
?>


