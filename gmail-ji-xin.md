---
description: 使用laravel來寄信部分
---

# GMAIL寄信

## 修改.env

.env 中有MAIL\_相關的參數，我們需要修改成如下：

```text
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=你發信用的gmail
MAIL_PASSWORD=發信用的gmail的密碼
MAIL_ENCRYPTION=tls
```

然後我們生成一隻專門做這發信的Controller出來：

```text
$ php artisan make:controller SendGmailController
```

在web.php宣告路由：

```text
Route::get('/sm', 'SendGmailController@sendmail');
```

在SendGmailController.php中：

```text
use Mail;

class SendGmailController extends Controller
{
    //
    public function sendmail()
    {
      $data = ['name' => 'Test'];
 Mail::send('gmailview', $data, function($message) {
  $message->to('收件人的email')->subject('This is test email');
 });
 return 'Your email has been sent successfully!';
   }
}
```

再新增Email內容的介面：\(resources/views/gmailview.blade.php\)

```text
<p>Hi {{ $name }}!</p>
```

最後直接在ip/sm測試就可以看到發信後的：

```text
Your email has been sent successfully!
```

再去收信就可以看到這封email了。

## 參考：

程式參考：[ https://kckct.wordpress.com/2016/03/19/laravel5\_send\_email\_using\_gmail/](https://kckct.wordpress.com/2016/03/19/laravel5_send_email_using_gmail/)

官方文件：[https://laravel.tw/docs/5.2/mail](https://laravel.tw/docs/5.2/mail)

