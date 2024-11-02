<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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


}
