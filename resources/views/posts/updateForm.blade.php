<!-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="{{ asset('/css/app.css') }}">
  <title>Laravel_test</title>
</head>
<body>
<header>
  <h1 class="page-header">Laravel個人課題</h1>
</header> -->
@extends('layouts.app')
@section('content')

<div class="container">
  <h2 class="page-header">投稿内容を更新する</h2>
  {!! Form::open(['url' => '/post/update']) !!}
  <div class="form-group">
    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-control']) !!}
  </div>
  <button type="submit" class="btn btn-primary pull-right">更新</button>
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
