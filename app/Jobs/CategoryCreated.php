<?php

namespace App\Jobs;

use App\Models\Category;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CategoryCreated implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Category $category)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

    }
}
