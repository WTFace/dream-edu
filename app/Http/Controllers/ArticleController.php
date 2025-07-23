<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  public function index() {
    $data = Article::paginate(20);
    return inertia()->render('article/Index', compact('data'));
  }

  public function create() {
    return inertia()->render('article/Create');
  }

  public function store(Request $request) {
    $request->validate([
      'title' => 'required|max:50',
      'src' => 'required'
    ]);

    $article = new Article();
    $article->title = $request->title;
    $article->src = $request->src;
    $article->save();

    return redirect()->route('article');
  }

  public function update(Request $request, Article $article) {
    $request->validate(['title' => 'max:50']);

    $article->update($request->all());
    return redirect()->back();
  }

  public function destroy(Article $article) {
    $article->delete();
    return redirect()->back();
  }
}
