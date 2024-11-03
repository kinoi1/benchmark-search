<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $articles = Article::where('title', 'LIKE', '%' . $query . '%')
                            // ->orWhere('content', 'LIKE', '%' . $query . '%')
                            ->get();

        return view('search', compact('articles', 'query'));
    }

    public function ajaxSearch(Request $request)
{
    $query = $request->input('query');

    $articles = Article::where('title', 'LIKE', '%' . $query . '%')
                        // ->orWhere('content', 'LIKE', '%' . $query . '%')
                        ->get();

    return response()->json($articles);
}



public function QueryBuilder($query){
    return DB::table('articles')
    ->where('title', 'LIKE', '%' . $query . '%')
    ->orWhere('content', 'LIKE', '%' . $query . '%')
    ->get();
}

public function FullTextSearch($query){
    DB::table('articles')
              ->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$query])
              ->get();
}

}
