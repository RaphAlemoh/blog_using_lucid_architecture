<?php

namespace App\Domains\Http\Jobs;

use Lucid\Units\Job;

class RedirectBackJob extends Job
{
    private $withInput;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($withInput = false)
    {
        $this->withInput = $withInput;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $back = back();

        if ($this->withInput) {
            $back->withInput();
        }

        return $back;
    }
}
