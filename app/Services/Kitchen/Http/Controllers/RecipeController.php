<?php

namespace App\Services\Kitchen\Http\Controllers;

use Lucid\Units\Controller;

class RecipeController extends Controller
{
    public function add()
    {
        return $this->serve(AddRecipeFeature::class);
    }
}
