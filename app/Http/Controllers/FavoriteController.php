<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 🔽 2行追加
use App\Models\Tweet;
use Auth;

class FavoriteController extends Controller
{

  // 省略

  // 🔽 編集（`store()` の `()` 内も異なるので注意）
  public function store(Tweet $tweet)
  {
    $tweet->users()->attach(Auth::id());
    return redirect()->route('tweet.index');
  }

  // 🔽 編集（`destroy()` の `()` 内も異なるので注意）
  public function destroy(Tweet $tweet)
  {
    $tweet->users()->detach(Auth::id());
    return redirect()->route('tweet.index');
  }
}