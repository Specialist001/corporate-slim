<?php

namespace App\Domain\OptionGroups\Jobs;

use App\Domain\OptionGroups\Models\OptionGroup;
use App\Domain\OptionGroups\Models\OptionGroupTranslation;
use App\Domain\OptionGroups\Requests\OptionGroupRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreOptionGroupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var OptionGroupRequest
     */
    private $request;

    /**
     * Create a new job instance.
     *
     * @param OptionGroupRequest $request
     */
    public function __construct(OptionGroupRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return OptionGroup
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $optionGroup = new OptionGroup();
            $optionGroup->type = $this->request->input('type');
            $optionGroup->active = $this->request->input('active');

            $optionGroup->save();

            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['title'] == '') {
                    continue;
                }
                $translations[] = new OptionGroupTranslation($translate);
            }
            if (!empty($translations)) {
                $optionGroup->translations()->saveMany($translations);
                $optionGroup->save();
            }
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $optionGroup;
    }
}
