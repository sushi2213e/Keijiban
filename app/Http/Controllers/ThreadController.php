<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Comment;
use App\Http\Requests\Create;
use App\Http\Requests\AddComment;

class ThreadController extends Controller
{
  public function index() {
    $threads = Thread::all();
    return view('home.index', [
      'threads' => $threads,
    ]);
  }

  public function showThread(Thread $thread) {
    $current_thread_comments = Comment::where('thread_id', $thread->id)->get();
    return view('threads.thread', [
      'thread' => $thread,
      'current_thread_comments' => $current_thread_comments,
    ]);
  }

  public function showCreateForm() {
    return view('threads.create');
  }

  public function create(Create $request) {
    $thread = new Thread();
    $thread->title = $request->title;
    $thread->save();
    $comment = new Comment();
    $comment->thread_id = $thread->id;
    $comment->name = $request->name;
    $comment->text = $request->text;
    $comment->save();
    session(['name' => $request->name]);
    return redirect(url('/', $thread->id));
  }

  public function addComment(Thread $thread, AddComment $request) {
    $comment = new Comment();
    $comment->thread_id = $thread->id;
    $comment->name = $request->name;
    $comment->text = $request->text;
    $comment->save();
    return redirect(url('/', $thread->id));
  }
}
