# Name
 
RESE
 
# Introduction
 
"RESE"は飲食店予約サービスに最低限必要なユーザー登録や店舗の追加、レビュー機能を備えたシンプルなアプリケーションです。
 
# Features
"RESE"は無料で公開しているアプリケーションです。経費をかけずに利用することができます。

# Requirement
 
"hoge"を動かすのに必要なライブラリなどを列挙する
 
* laravel 8.83.1

# Installation
 
laravel(Composer)インストール(mac)
```bash
    php -r "copy（ 'https://getcomposer.org/installer'、'composer-setup.php'）;"
    php -r "if（hash_file（ 'sha384'、 'composer-setup.php'）=== '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8'）{echo ' php '）;} echo PHP_EOL; "
    phpcomposer-setup.php
    php -r "unlink（ 'composer-setup.php'）;"
```
必要パッケージのインストール
```bash
    composer install
```
 
# Usage
 
管理者(user name:admin)を作成し、システム管理画面から店舗責任者を作成します。
店舗責任者が自身の店舗を登録し、公開します。

 
```bash
git clone https://github.com/shota0810/RESE.git
```
 
# Note
 
管理者の名前は'admin'に設定してください。
なお、名前(name)及び権限(role)の更新は、直接DBで更新してください。
 
 ```bash
update users set name = 'admin' where id = 該当の番号
update users set role = 1 where id = 該当の番号
```
# Author
 
作成情報を列挙する
 
* 作成者　臼井翔太
* E-mail　sample@gmail.com
 
# License
ライセンスを明示する
 
"RESE" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).
