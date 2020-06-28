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

class UpdateOptionGroupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var OptionGroupRequest
     */
    private $request;
    /**
     * @var OptionGroup
     */
    private $optionGroup;

    /**
     * Create a new job instance.
     *
     * @param OptionGroupRequest $request
     * @param OptionGroup $optionGroup
     */
    public function __construct(OptionGroupRequest $request, OptionGroup $optionGroup)
    {
        $this->request = $request;
        $this->optionGroup = $optionGroup;
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
            $optionGroup = $this->optionGroup;
            $optionGroup->type = $this->request->input('type');
            $optionGroup->active = $this->request->input('active');
            $optionGroup->save();

            $optionGroup->translations()->delete();
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
