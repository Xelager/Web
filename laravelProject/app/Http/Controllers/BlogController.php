<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function show()
    {
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(1);
        Paginator::useBootstrap();
        return view("blog", compact('publications'));
    }
}
