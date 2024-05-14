<!-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='/css/app.css'>
  <title>Laravel_test</title>
</head>
<body>
<header>
  <h1 class="page-header">Laravel個人課題</h1>
</header> -->
@extends('layouts.app')
@section('content')

<div class="container">
  <h2 class="page-header">新しく投稿する</h2>
  {!! Form::open(['url' => 'post/create']) !!}
  <div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
  </div>
  <button type="submit" class="btn btn-success pull-right">追加</button>
  {!! Form::close() !!}
</div>

@endsection
<!-- <footer>
  <small>Laravel_test@crud.curriculum</small>
</footer>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html> -->
