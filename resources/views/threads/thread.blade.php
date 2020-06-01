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
  <div class="box rounded w-75 p-1 m-2">
    <p class="m-1">{{ $thread->title }}</p>
    <p class="small font-weight-light m-1">作成：{{ $thread->created_at }}</p>
  </div>
  <div class="box rounded p-1 m-2 w-75">
    コメントする
  　<form class="my-0" action="{{ url('/', $thread->id) }}" method="post">
    　{{ csrf_field() }}
      　<p class="my-0">名前</p>
    　  <textarea rows="1" cols="20" name="name">{{ old('name', session('name')) }}</textarea>
    　  @if ($errors->has('name'))
    　  <p class="error">{{ $errors->first('name') }}</p>
    　  @endif
    　  <p class="mb-0">コメント</p>
    　  <textarea rows="10" cols="40" name="text">{{ old('text') }}</textarea>
    　  @if ($errors->has('text'))
        <p class="error">{{ $errors->first('text') }}</p>
        @endif
        <button type="submit" class="btn btn-info btn-sm mt-2">送信</button>
    </form>
  </div>
  <?php $i = 0; ?>
  @foreach($current_thread_comments as $current_thread_comment)
  <?php $i++; ?>
  <div class="box rounded w-75 p-1 m-2">
    <p class="mx-1 my-0" >{{ $i . "　" . $current_thread_comment->name }}</p>
    <p class="small font-weight-light mx-1 my-0">{{ $thread->created_at }}</p>
    <p class="m-1">{!! nl2br(e($current_thread_comment->text)) !!}</p>
  </div>
  @endforeach
</body>
@endsection
