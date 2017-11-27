<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;

class SearchController extends Controller
{
    public function index(){
    	if(isset($_GET['q'])){
    		$searchTerm = $_GET['q'];
    		//manipulate the variable if needed
    	} else{
    		$serachTerm = "";
    	}

    	$searchResults = BlogPosts::where('post_title', 'LIKE', '%'.$searchTerm.'%')
    	->orWhere('post_description', 'LIKE', '%'.$searchTerm.'%')
    	->get();

    	return view('search.index', compact('searchResults'));
    }
}
