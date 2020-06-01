@extends('layouts.default')

@section('title', '掲示板')

@section('content')
<header>
  <div class="row">
    <div class="font-weight-bold m-3">掲示板</div>
    <div class="m-3">
      <a href="{{ url('/') }}" class="btn btn-info btn-sm">戻る</a>
    </div>
  </div>
</header>
<body>
  <p>新規スレッド</p>
  <form class="" action="{{ url('/new') }}" method="post">
    {{ csrf_field() }}
    <div class="">
      <p class="mb-0">名前</p>
      <textarea rows="1" cols="20" name="name">{{ old('name', session('name')) }}</textarea>
      @if ($errors->has('name'))
      <p class="error">{{ $errors->first('name') }}</p>
      @endif
    </div>
    <div class="">
      <p class="mb-0">スレッドタイトル</p>
      <textarea rows="2" cols="40" name="title">{{ old('title') }}</textarea>
      @if ($errors->has('title'))
      <p class="error">{{ $errors->first('title') }}</p>
      @endif
    </div>
    <div class="">
      <p class="mb-0">コメント</p>
      <textarea rows="10" cols="60" name="text">{{ old('text') }}</textarea>
      @if ($errors->has('text'))
      <p class="error">{{ $errors->first('text') }}</p>
      @endif
    </div>
    <div class="">
      <button type="submit" class="btn btn-info btn-sm mt-2">作成</button>
    </div>
  </form>
</body>
@endsection
