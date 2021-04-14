<?php

namespace App\Services\Kitchen\Operations;

use Lucid\Units\Operation;
use App\Data\Collections\IngredientsCollection;
use App\Domains\Recipe\Jobs\ParseIngredientsJob;
use App\Domains\Recipe\Jobs\CalculateIngredientsTotalJob;

class CalculateRecipePriceOperation extends Operation
{
    private string $ingredients;

    public function __construct(string $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function handle(): float
    {
        $ingredients = $this->run(ParseIngredientsJob::class, [
            'ingredients' => $this->ingredients,
        ]);

        return $this->run(new CalculateIngredientsTotalJob($ingredients));
    }
}