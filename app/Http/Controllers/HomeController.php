<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
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

    }

}
