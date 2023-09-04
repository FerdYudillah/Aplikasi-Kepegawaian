<?php
namespace App\DA;
use Illuminate\Support\Facades\DB;
class KirimEmail
{
  public static function send($to_email,$subject,$html_content)
  {
    $ch = curl_init();
    // $datanya = ["sender"=>["name"=>"Riswandi Adha", "email"=>"riswandiadha.e03100141@gmail.com"], "to"=>[["email"=>$to_email,"name"=>$to_email]],"subject"=>$subject,"htmlContent"=>$html_content];
    $datanya = ["sender"=>["name"=>"Satpol PP - Kepegawaian", "email"=>"satpol.pp@gmail.com"], "to"=>[["email"=>$to_email,"name"=>$to_email]],"subject"=>$subject,"htmlContent"=>$html_content];
    curl_setopt($ch, CURLOPT_URL,"https://api.brevo.com/v3/smtp/email");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datanya));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //get api key from https://app.brevo.com/settings/keys/api
    $headers = [
        'accept: application/json',
        'api-key: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',
        'content-type: application/json',
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    // dd($server_output, $datanya, $headers);
  }
}
