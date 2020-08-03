# Laplaces

##　開発環境/本番環境
・php 7.4.3
・laravel 3.0
・docker
・laradock
・mysql
・AWS

##　実装機能
・Userの登録機能
・ログイン/ログアウト機能
・お店の登録/編集/削除
・商品の登録/編集/削除/複数登録
・記事の投稿機能
・画像登録機能/複数登録
・注文機能
・お問い合わせ機能
・レビュー機能
・お気に入り機能
・検索機能
・モーダル機能

 
## usersテーブル
|Column|Type|Options|
|------|----|-------|
|name|string|null: false|
|email|string|null: false|
|password|integer|null: false|
|uregion|string|null: false|
|uphoto|integer|null: false|
|shop_id|integer|null: false, foreign_key: true|
|favorite_id|integer|null: false, foreign_key: true|
|reservation_id|integer|null: false, foreign_key: true|
|post_id|integer|null: false, foreign_key: true|
|review_id|integer|null: false, foreign_key: true|
|post_id|integer|null: false, foreign_key: true|


### Association
- has_many shops
- has_many reviews
- has_many favorites
- has_many reviews
- has_many posts
- belongs_to chat
- belongs_to reservation
- has_many shops, throuth: :favorites	
- has_many shops throuth reviews



## shopsテーブル
|Column|Type|Options|
|------|----|-------|
|sname|string|null: false|
|sprice|integer|null: false|
|region|string|null: false|
|datail|text|
|store_in|string|null: false|
|take_out|string|null: false|
|delivery|string|null: false|
|user_id|integer|null: false, foreign_key: true|
|image_id|integer|null: false, foreign_key: true|
|commodity_id|integer|null: false, foreign_key: true|
|post_id|integer|null: false, foreign_key: true|
|chat_id|integer|null: false, foreign_key: true|
|reservation_id|integer|null: false, foreign_key: true|
|favorite_id|integer|null: false, foreign_key: true|



### Association
- has_many commodities
- has_many images
- has_many reviews
- has_many posts
- has_many favorites
- belongs_to :user
- belongs_to :reservation
- belongs_to chat
- has_many users throuth reviews


## commoditiesテーブル
|Column|Type|Options|
|------|----|-------|
|name|string|null: false|
|price|string|null: false|
|description|text|
|user_id|integer|null: false, foreign_key: true|
|shop_id|integer|null: false, foreign_key: true|
|image_id|integer|null: false, foreign_key: true|


### Association
- has_many images
- has_many reservations
- belongs_to :user
- belongs_to :shop
- has_many favorites
- has_many users throuth favorites


## imagesテーブル
|Column|Type|Options|
|------|----|-------|
|image|string|
|shop_id|integer|null: false, foreign_key: true|
|commodity_id|integer|null: false, foreign_key: true|
|post_id|integer|null: false, foreign_key: true|


### Association
- belongs_to :shop
- belongs_to :commodity
- belongs_to :reservation


## reservationsテーブル
|Column|Type|Options|
|------|----|-------|
|remark|text|
|user_id|integer|null: false, foreign_key: true|
|shop_id|integer|null: false, foreign_key: true|
|commodity_id|integer|null: false, foreign_key: true|
|image_id|integer|null: false, foreign_key: true|


### Association
- has_many shops
- has_many reservations
- belongs_to :user
- belongs_to :commodity


## reviewsテーブル
|Column|Type|Options|
|------|----|-------|
|evaluation|text|null: false|
|detail|text|
|user_id|integer|null: false, foreign_key: true|
|shop_id|integer|null: false, foreign_key: true|


### Association
- belongs_to :user
- belongs_to :shop


## favoritesテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|integer|null: false, foreign_key: true|	
|favorite_id|integer|null: false, foreign_key: true|

### Association
- belongs_to :user
- belongs_to :shop


## postsテーブル
|Column|Type|Options|
|------|----|-------|
|post|text|
|user_id|integer|null: false, foreign_key: true|
|shop_id|integer|null: false, foreign_key: true|
|image_id|integer|null: false, foreign_key: true|

### Association
- belongs_to :user
- belongs_to :shop
- has_many :images

## chatsテーブル
|Column|Type|Options|
|------|----|-------|
|send|integer|null: false|
|recieve|integer|null: false|
|title|string|null: false|
|message|text|null: false|
|shop_id|integer|null: false, foreign_key: true|
|image_id|integer|null: false, foreign_key: true|

### Association
- has_many :users
- has_many :shops
