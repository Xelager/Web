<?php

namespace App\Http\Controllers;

use App\Models\Data\InterestsModel;
use Illuminate\Routing\Controller;

class InterestsController extends Controller
{
    public function show()
    {
        $interests = new InterestsModel();
        return view("interests", ['interests' => $interests]);
    }
}
