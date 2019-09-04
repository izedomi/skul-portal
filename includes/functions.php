<?php



function stringInsert($str,$insertstr,$pos)
{
    $str = substr($str, 0, $pos) . $insertstr . substr($str, $pos);
    return $str;
}

function amount_fee_delimeter($amount){

  if(strlen($amount) == 6){ $amount = stringInsert($amount, "," , 3); }
  if(strlen($amount) == 5){ $amount = stringInsert($amount, "," , 2); }
  if(strlen($amount) == 4){ $amount = stringInsert($amount, "," , 1); }
  if(strlen($amount) <= 3){ $amount = $amount; }

  return $amount;
}




 ?>
