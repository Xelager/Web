<?php

namespace App\Http\Controllers;

use App\Models\Data\GalleryModel;
use Illuminate\Routing\Controller;

class GalleryController extends Controller
{
    public function show()
    {
        $gallery = new GalleryModel();
        return view("gallery", ['gallery' => $gallery]);
    }
}
