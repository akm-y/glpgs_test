# ◇お題
- - -  
下記の基本仕様を持つWebアプリケーションを実装して下さい。  
・郵便番号を入力すると、郵便番号に対応する住所を検索し、結果を表示します  
・郵便番号から住所を検索するために、Web上のAPIを利用します  
・言語はPHPで、Laravel等のフレームワークを利用しても構いません。  
※郵便番号検索APIの例  
http://zipcloud.ibsnet.co.jp/doc/api

## 環境
言語：PHP 7.3  
FW：Laravel  
サーバ：nginx

## 実行
srcフォルダと同じ階層でlaradockをクローン
```
git clone https://github.com/LaraDock/laradock.git
```

作業ディレクトリ移動
```
cd laradock
```
.envファイルの作成 & 編集
```
cp env-example .env
```
.envファイルのプロパティを下記に修正
```
APP_CODE_PATH_HOST=../src/
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
