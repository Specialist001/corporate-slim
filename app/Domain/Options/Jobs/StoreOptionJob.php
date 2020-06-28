<?php

namespace App\Domain\Options\Jobs;

use App\Domain\Options\Models\Option;
use App\Domain\Options\Models\OptionTranslation;
use App\Domain\Options\Requests\OptionRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreOptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var OptionRequest
     */
    private $request;

    /**
     * Create a new job instance.
     *
     * @param OptionRequest $request
     */
    public function __construct(OptionRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return Option
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $option = new Option();
            $option->option_group_id = $this->request->input('option_group_id');
            $option->order = $this->request->input('order', 0);
            $option->type = $this->request->input('type', Option::TYPE_INPUT);
            $option->save();

            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['name'] == '') {
                    continue;
                }
                $translations[] = new OptionTranslation($translate);
            }
            if (!empty($translations)) {
                $option->translations()->saveMany($translations);
                $option->save();
            }

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $option;
    }
}
