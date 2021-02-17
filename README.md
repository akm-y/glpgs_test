# ◇要件
- - -  
下記の基本仕様を持つWebアプリケーション  
・郵便番号を入力すると、郵便番号に対応する住所を検索し、結果を表示  
・郵便番号から住所を検索するために、Web上のAPIを利用  
※郵便番号検索APIの例  
http://zipcloud.ibsnet.co.jp/doc/api

## 環境
言語：PHP 7.3  
FW：Laravel  

## 実行（※メモ）

作業ディレクトリ移動
```
cd laradock
```

Docker起動
```
docker-compose up -d nginx
```

ブラウザでアクセス  
http://localhost:9999

Dockerコンテナに接続
```
docker-compose exec workspace bash
```
Dockerコンテナ終了
```
docker-compose down
```
