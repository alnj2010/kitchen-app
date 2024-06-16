<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RecipeIngredientsRequested implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $recipeIngredients;
     public function __construct($recipeIngredients) // TODO typing
    {
        $this->onQueue('requested_ingredients');
        $this->recipeIngredients = $recipeIngredients;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
