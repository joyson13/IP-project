<?php

$sql = "SELECT * FROM customer where customer_id like '$customer_id';";

if(($result=$conn->query($sql))->num_rows>0)
{


    $rowunique = $result->fetch_assoc();

    $customer_email = $rowunique['email'];
    $customer_name = $rowunique['name'];

    $subject = "Your gym";
    $message = "Dear ".$customer_name.", your payment is completed";
    mail($customer_email,$subject,$message);

}
