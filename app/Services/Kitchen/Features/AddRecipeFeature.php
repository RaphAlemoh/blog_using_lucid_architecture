<?php

namespace App\Services\Kitchen\Features;

use Lucid\Units\Feature;
use Illuminate\Support\Facades\Auth;
use App\Domains\Recipe\Requests\AddRecipe;

class AddRecipeFeature extends Feature
{
    public function handle(AddRecipe $request)
    {
        $price = $this->run(CalculateRecipePriceOperation::class, [
            'ingredients' => $request->input('ingredients'),
        ]);

        $this->run(SaveRecipeJob::class, [
            'title' => $request->input('title'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'price' => $price,
            'user' => Auth::user(),
        ]);

        return $this->run(RedirectBackJob::class);
    }


    
}
