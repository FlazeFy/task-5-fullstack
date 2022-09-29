<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

//Model.
use App\Models\Articles;
use App\Models\Categories;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //$categories = Categories::where('user_id', Auth::user()->id)->get();

        if(count($categories) != 0){
            $articles = Articles::whereBelongsTo($categories)->get();
        } else {
            $articles = [];
        }

        return response()->json([
            'status' => 'success',
            'result' => $articles,
        ]);
    }

    //Create.
    public function createCategories(Request $request)
    {
        //Check name avaiability.
        $check = DB::table('categories')
            ->select()
            ->where('name', $request->name)
            ->where('user_id', $request->user_id)
            ->get();

        if(count($check) == 0){
            $result = Categories::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'created_at' => date("Y-m-d h:i"),
                'updated_at' => date("Y-m-d h:i")
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Categories created successfully',
                'result' => $result,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Categories created failed',
                'result' => $result,
            ]);
        }
    }

    public function createArticles(Request $request)
    {
        //Check title avaiability.
        $check = DB::table('articles')
            ->select()
            ->where('title', $request->title)
            ->where('user_id', $request->user_id)
            ->get();
        
        if(count($check) == 0){
            $result = Articles::create([
                'categories_id' => $request->category,
                'user_id' => $request->user_id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => null,
                'created_at' => date("Y-m-d h:i"),
                'updated_at' => date("Y-m-d h:i"),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Articles created successfully',
                'result' => $result,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Articles created failed',
                'result' => $result,
            ]);
        }
    }

    //Read.
    public function getAllCategories()
    {
        $result = Categories::all();
        return response()->json([
            'status' => 'success',
            'result' => $result,
        ]);
    }

    public function getArticles()
    {
        $result = DB::table('articles')->paginate(2);
        return response()->json([
            'status' => 'success',
            'result' => $result,
        ]);
    }

    public function getAllArticles($id) //By user id
    {
        $categories = Categories::where('user_id', $id)->get();

        if(count($categories) != 0){
            $result = Articles::whereBelongsTo($categories)->get();
        } else {
            $result = [];
        }

        return response()->json([
            'status' => 'success',
            'result' => $result,
        ]);
    }

    //Update.
    public function updateArticles(Request $request, $id)
    {
        //Check name avaiability.
        $check = DB::table('articles')
            ->select()
            ->where('title', $request->name)
            ->where('user_id', $request->user_id)
            ->get();

        if(count($check) == 0){
            $result = Articles::where('id', $id)->update([
                'categories_id' => $request->category,
                'title' => $request->title,
                'content' => $request->content,
                'updated_at' => date("Y-m-d h:i")
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Articles updated successfully',
                'result' => $result,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Articles updated failed',
                'result' => null,
            ]);
        }
    }

    public function updateCategories(Request $request, $id)
    {
        //Check name avaiability.
        $check = DB::table('categories')
            ->select()
            ->where('name', $request->name)
            ->where('user_id', $request->user_id)
            ->get();

        if(count($check) == 0){
            $result = Categories::where('id', $id)->update([
                'name' => $request->name,
                'updated_at' => date("Y-m-d h:i")
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Categories updated successfully',
                'result' => $result,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Categories updated failed',
                'result' => null,
            ]);
        }
    }

    //Delete.
    public function deleteCategories(Request $request, $id)
    {
        $result = Categories::destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Categories deleted successfully',
            'result' => $result,
        ]);
    }

    public function deleteArticles(Request $request, $id)
    {
        $result = Articles::destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Articles deleted successfully',
            'result' => $result,
        ]);
    }
}
