<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth;

//Model.
use App\Models\Articles;
use App\Models\Categories;

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
        $categories = Categories::where('user_id', Auth::user()->id)->get();

        if(count($categories) != 0){
            $articles = Articles::whereBelongsTo($categories)->get();
        } else {
            $articles = [];
        }

        return view('home')
            ->with('categories', $categories)
            ->with('articles', $articles);
    }

    //Delete.
    public function delete_categories(Request $request, $id)
    {
        Categories::destroy($id);

        return redirect()->back();
    }

    public function delete_articles(Request $request, $id)
    {
        Articles::destroy($id);

        return redirect()->back();
    }
}
