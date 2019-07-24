<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

class SendGmailController extends Controller
{
    //
    public function sendmail()
    {
      $data = ['name' => 'Test'];
 Mail::send('gmailview', $data, function($message) {
  $message->to('ngiokpeng@gmail.com')->subject('This is test email');
 });
 return 'Your email has been sent successfully!';
   }
}
