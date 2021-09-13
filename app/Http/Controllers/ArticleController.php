<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;



class ArticleController extends Controller
{
    public function create(Request $req)
    {

     /*   $article = new Article([
        'text' => $request->get('text'),
       ]); */
       //print_r($req->input());
       $article = new Article;
       $article->text = $req->text;
       $article->user_id = auth()->user()->id;
       $article->save();
       return redirect('home');

    }
    public function AllPosts( Auth $user, Article $article){
        $articles = $article->where("user_id", "=", $user->id)->get();
        return view('home' , compact('articles'));
    }
    public function show()
    {

        $articles = Article::all();
        $user = Auth::user();
        return view('home', compact('articles','user'));
    }
    public function delete($id)
    {
        $user_id = Auth::id();
        $articles = article::where([['user_id', $user_id], ['id', $id]])->firstorfail()->delete();
        //echo("Deleted Successfully");
        return redirect()->back()->withSuccess('Deleted Successfully');
    }

    // public function show($id)
    //  {
    // //     $user = User::find($id);
    // //     $articles = $article->posts()->get();

    // //     return View::make("view")->with(array("user" => $user, "posts" => $posts));
    // }
    public function showDataForComment($id)
    {
        $comments = Comment::all();
        $article = Article::find($id);

        return view ('comment',['article'=>$article],compact('comments'));
    }
    public function addComment(Request $req)
    {
        $comments = Comment::all();
        $article = Article::find($req->id);
        $comment = new Comment;
        $comment->text = $req->text;
        $comment->article_id = $article->id;
        $comment->save();
        return redirect ('comment/'.$article->id);
    }

    public function showData($id)
    {
        $article = Article::find($id);
        return view ('edit',['article'=>$article]);
    }

    public function edit(Request $req)
    {
        $article = Article::find($req->id);
        $article->text = $req->text;
        $article->save();
        return redirect ('home');
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    // public function delete(Request $request, $id)
    // {
    //     $article = Article::findOrFail($id);
    //     $article->delete();

    //     return 204;
    // }
}
