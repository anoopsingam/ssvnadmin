<?php 

if($bill['installment']==$balance['installment']){
  echo "Deleted";
}else{
  echo "Un Match";
}

echo"<pre>";



echo "<br> t paid =".$paying_fee=$bill['paying_fee'];
echo "<br> t bal =". $balance_amount=$bill['balance_amount'];
echo "<br> t dis=".$discount=$bill['discount'];
echo "<br> tr paid=".$transport_fee_paying=$bill['transport_fee_paying'];
echo "<br> tr bal=".$transport_fee_balance=$bill['transport_fee_balance'];
echo "<br> tr dis=".$transport_discount=$bill['transport_discount'];
echo "<br> ub paid=".$ubs_fee_paying=$bill['ubs_fee_paying'];
echo "<br> ub bal=".$ubs_fee_balance=$bill['ubs_fee_balance'];
echo "<br> ub dis=".$ubs_discount=$bill['ubs_discount'];




echo "<br>b t  paid = ". $tution_fee_paid=$balance['tution_fee_paid'];
echo "<br>b t bal = ". $tution_balance_fee=$balance['tution_balance_fee'];
echo "<br>b t dis = ". $tution_fee_discount=$balance['tution_fee_discount'];
echo "<br>b tr paid = ". $transport_fee_paid=$balance['transport_fee_paid'];
echo "<br>b tr bal = ". $transport_balance=$balance['transport_balance'];
echo "<br>b tr dis = ". $transport_fee_discount=$balance['transport_fee_discount'];
echo "<br>b ub paid = ". $ubs_fee_paid=$balance['ubs_fee_paid'];
echo "<br>b ub bal = ". $ubs_balance=$balance['ubs_balance'];
echo "<br>b ub dis =". $ubs_fee_discount=$balance['ubs_fee_discount']."<br><br><br><br><br>";

echo "UPD Tution Fee : ".$upd_tution_fee_paying=$tution_fee_paid-$paying_fee."<br>";
echo "UPD Balance Fee : ".$upd_tution_balance_fee=$tution_balance_fee+$paying_fee."<br>";
echo "UPD Transport Fee : ".$upd_transport_fee_paying=$transport_fee_paid-$transport_fee_paying."<br>";
echo "UPD Transport Balance : ".$upd_transport_balance=$transport_balance+$transport_fee_paid."<br>";
echo "UPD UBS Fee : ".$upd_ubs_fee_paying=$ubs_fee_paid-$ubs_fee_paying."<br>";

?>