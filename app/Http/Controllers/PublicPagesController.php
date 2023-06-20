<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PublicPagesController extends Controller
{
    //
    public function homePage()
    {
        return Inertia::render('Public/Home', [
            'posts' => Post::filter(
                request(['search', 'category', 'status', 'dateStart', 'dateEnd', 'sortBy']))
                ->paginate(10)->withQueryString(),
            'filters' => Request::only(['search', 'sortBy', 'category', 'status', 'dateStart', 'dateEnd']),
            'categories' => Category::all(),
        ]);
    }
}
