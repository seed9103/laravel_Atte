#Atte
勤怠管理システム

##ページ一覧

内容 | パス 
--- | --- 
打刻ページ|/
会員登録ページ |/register
ログインページ |/login
日付別勤怠ページ　|/attendance

##機能一覧

|機能 | 詳細 |
|--- | --- |
|会員登録| Laravelの認証機能（Fortify）を利用|
|ログイン |〃|
|ログアウト |〃|
|勤務開始　||
|勤務終了||
|休憩開始 |1日で何度も休憩が可能|
|休憩終了 |〃|
|ページネーション　|5件ずつ取得|

##テーブル設計
![table](https://github.com/seed9103/laravel_Atte/assets/154680643/c9e4e577-e595-4ab1-9947-987809a723c1)

##ER図
![ER](https://github.com/seed9103/laravel_Atte/assets/154680643/3746872f-5885-4b6a-8551-d34eef55b7fe)

##環境構築

-Dockerビルド
1.`git@github.com:seed9103/laravel_Atte.git`  
2.`docker-compose up -d --build`

-Laravel環境構築
1.docker-compose exec php bash  
2.composer install  
3..env.exampleファイルから.envを作成し、環境変数を変更  
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
4.アプリケーションキー
``` bash
php artisan key:generate
```
5.マイグレーション
``` bash
php artisan migrate
```
6.シーディング
``` bash
php artisan db:seed
```

##使用技術
- PHP 7.4.9
- Laravel8.83.27
- MySQL8.0.26

##URL
- 開発環境：http://localhost/
- phpMyAdmin:：http://localhost:8080/