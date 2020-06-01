@extends('layouts.default')

@section('title', '掲示板')

@section('content')
<header>
  <p class="font-weight-bold m-3">掲示板</p>
</header>
<body>
  <a href="{{ url('/new') }}" class="btn btn-info btn-sm">スレッドを立てる</a>
  <p class="m-2">スレッド一覧</p>
  @foreach($threads as $thread)
    <div class="linkbox rounded w-75 p-1 m-2">
      <a href="{{ url('/', $thread->id) }}" class="link"></a>
      <p class="m-1">{{ $thread->title }}</p>
      <p class="small font-weight-light m-1">作成：{{ $thread->created_at }}</p>
    </div>
  @endforeach
</body>
@endsection
<!--  -->
