<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<title>@yield('title')</title>
</head>
<body class="uk-background-muted">
  <h1 class="uk-heading-small">
    <a href="index" class="uk-link-reset">NaoTube</a>
  </h1>
  <div class="uk-margin-large-bottom">
    <div>
      <form class="uk-text-center uk-margin-large-top" action="search" method="GET">
        {{ csrf_field() }}
        <input class="uk-input uk-form-width-large " type="text" name="keyword" placeholder="検索したいキーワードを入力してください">
        <input class="uk-button uk-button-default" type="submit" value="検索">
      </form>
    </div>
    <form action="categories" method="get">
          <select class="uk-button uk-button-default uk-select uk-form-width-small uk-align-right" name="categories" onchange="submit(this.form);">
              <option disabled selected>カテゴリ</option>
              <option value="1">アニメ&映画</option>
              <option value="10">音楽</option>
              <option value="15">動物</option>
              <option value="17">スポーツ</option>
              <option value="20">ゲーム</option>
              <option value="28">科学</option>
          </select>
    </form>
  </div>
  <hr class="uk-divider-icon">
  @section('main')
      
  @show
</body>
</html>