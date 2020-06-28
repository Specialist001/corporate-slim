<?php

namespace App\Domain\Options\Jobs;

use App\Domain\Options\Models\Option;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteOptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Option
     */
    private $option;

    /**
     * Create a new job instance.
     *
     * @param Option $option
     */
    public function __construct(Option $option)
    {
        $this->option = $option;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->option->translations()->delete();
            $this->option->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
