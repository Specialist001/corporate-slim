<?php

namespace App\Domain\OptionGroups\Jobs;

use App\Domain\OptionGroups\Models\OptionGroup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteOptionGroupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var OptionGroup
     */
    private $optionGroup;

    /**
     * Create a new job instance.
     *
     * @param OptionGroup $optionGroup
     */
    public function __construct(OptionGroup $optionGroup)
    {
        $this->optionGroup = $optionGroup;
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
            $this->optionGroup->translations()->delete();
            $this->optionGroup->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
