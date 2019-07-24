---
description: 新增專案及跟github連結
---

# 專案及git建置

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

