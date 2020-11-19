<?php
require('./instamojo.php');
const API_KEY ="test_4c32f977556b1fce4a1e86c0520";
const AUTH_TOKEN = "test_bd00ef9a4717f06f0a6332b40e9";


if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://test.instamojo.com/api/1.1/');
    
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => 'Donation',
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "send_email" => true,
            "email" => $_POST['email'],
            "redirect_url" => "http://internship-demo.great-site.net//success.html"
            ));
        header('Location:'. $response['longurl']);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
?>