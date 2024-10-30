<?php

namespace App\Jobs;

use App\Recipes\Scraper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ScrapeRecipe implements ShouldQueue
{
    use Queueable;


    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $url
    ) {}

    /**
     * Execute the job.
     */
    public function handle(Scraper $scraper): void
    {
        $recipe = $scraper->scrape($this->url);

        if (!$recipe->save()) {
            $this->fail();
        } 
    }
}
