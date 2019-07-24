---
description: 新增專案及跟github連結，再用laravel來發信
---

# 從git建置到發信

## 建立laravel專案

新建專案（此專案為5.8版\)

```
$ composer create-project laravel/laravel="5.8.*" mailviagmail --prefer-dist
```

## git 建置

初始化 git ：

```text
$ git init
```

會出現 ：

```text
$ Initialized empty Git repository in /Users/iokpeng/mailviagmail/.git/
```

同時也會在專案檔案夾看到一個新出來的 .git 檔案夾。

加入origin：

```text
$ git remote add origin https://github.com/deloppeng/mailviagmail.git
```

開始第一次的commit：

```text
$ git add -A
$ git commit -m "first commit"
```

然後會看到很長的檔案被加進去了：

```text
[master (root-commit) e9592ba] first commit
 84 files changed, 8031 insertions(+)
 create mode 100644 .env.example
 create mode 100644 .styleci.yml
 create mode 100644 app/Console/Kernel.php
 create mode 100644 app/Exceptions/Handler.php
 ...
```

push 上去：

```text
git push origin master
```

會要輸入你 github 帳號及密碼，然後跑完就好了：

```text
Counting objects: 113, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (96/96), done.
Writing objects: 100% (113/113), 186.72 KiB | 4.79 MiB/s, done.
Total 113 (delta 8), reused 0 (delta 0)
remote: Resolving deltas: 100% (8/8), done.
To https://github.com/deloppeng/mailviagmail.git
 * [new branch]      master -> master

```

然後去該 repository 就可以看到了。



## GMAIL寄信

### 修改.env

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

### 

### 參考：

程式參考： [https://kckct.wordpress.com/2016/03/19/laravel5\_send\_email\_using\_gmail/](https://kckct.wordpress.com/2016/03/19/laravel5_send_email_using_gmail/)

官方文件：[https://laravel.tw/docs/5.2/mail](https://laravel.tw/docs/5.2/mail)

