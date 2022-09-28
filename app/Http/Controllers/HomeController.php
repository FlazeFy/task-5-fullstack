<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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

    //Create.
    public function add_categories(Request $request)
    {
        //Check name avaiability.
        $check = DB::table('categories')
            ->select()
            ->where('name', $request->name)
            ->where('user_id', Auth::user()->id)
            ->get();

        if(count($check) == 0){
            Categories::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'created_at' => date("Y-m-d h:m:i"),
                'updated_at' => date("Y-m-d h:m:i")
            ]);

            return redirect()->back();
        } else {
            return redirect()->back()->with('failed_message', 'Kategori sudah ada. Gunakan nama yang lain!');
        }
    }

    public function add_articles(Request $request){
        //Check title avaiability.
        $check = DB::table('articles')
            ->select()
            ->where('title', $request->title)
            ->where('user_id', Auth::user()->id)
            ->get();

        //Validate image.
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        //Upload image.
        $image = $request->file('image');
        $image->storeAs('public', $image->hashName());
        $imageURL = $image->hashName();

        if(count($check) == 0){
            Articles::create([
                'categories_id' => $request->category,
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imageURL,
                'created_at' => date("Y-m-d h:m:i"),
                'updated_at' => date("Y-m-d h:m:i"),
            ]);

            return redirect()->back();
        } else {
            return redirect()->back()->with('failed_message', 'Validasi gagal!, periksa kembali data Anda');
        }
    }

    //Update.
    public function update_categories(Request $request, $id)
    {
        //Check name avaiability.
        $check = DB::table('categories')
            ->select()
            ->where('name', $request->name)
            ->where('user_id', Auth::user()->id)
            ->get();

        if(count($check) == 0){
            Categories::where('id', $id)->update([
                'name' => $request->name,
                'updated_at' => date("Y-m-d h:m:i")
            ]);

            return redirect()->back();
        } else {
            return redirect()->back()->with('failed_message', 'Kategori sudah ada. Gunakan nama yang lain!');
        }
    }

    public function update_articles(Request $request, $id)
    {
        //Check name avaiability.
        $check = DB::table('articles')
            ->select()
            ->where('title', $request->name)
            ->where('user_id', Auth::user()->id)
            ->get();

        if(count($check) == 0){
            Articles::where('id', $id)->update([
                'categories_id' => $request->category,
                'title' => $request->title,
                'content' => $request->content,
                'updated_at' => date("Y-m-d h:m:i")
            ]);

            return redirect()->back();
        } else {
            return redirect()->back()->with('failed_message', 'Kategori sudah ada. Gunakan nama yang lain!');
        }
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
