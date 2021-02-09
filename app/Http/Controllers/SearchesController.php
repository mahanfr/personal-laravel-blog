<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchesController extends Controller
{
    public function getIndex(Request $request){
        $s = $request->query('s');
		
		// Query and paginate result
		$posts = Post::where('title', 'like', "%$s%")
				->orWhere('body', 'like', "%$s%")
				->paginate(20);

		return view('searches.index', ['posts' => $posts, 's' => $s ]);
    }
}
