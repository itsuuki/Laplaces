<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a class="shop-new" href="Shop/create">
    店を登録する
  </a>
  <a class="shop-news" href="Shop/edit">
    店を編集する
  </a>
  <a class="card-link" href="{{ route('Shop.show', ['shop' => $shop]) }}">
    続きを読む
  </a>
</body>
</html>