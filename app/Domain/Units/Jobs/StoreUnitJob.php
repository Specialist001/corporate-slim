<?php

namespace App\Domain\Units\Jobs;

use App\Domain\Units\Models\Unit;
use App\Domain\Units\Models\UnitTranslation;
use App\Domain\Units\Requests\UnitRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreUnitJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    private $request;

    /**
     * Create a new Unit instance.
     *
     * @param UnitRequest $request
     */
    public function __construct(UnitRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return Unit
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $unit = new Unit();
            $unit->save();

            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['name'] == '') {
                    continue;
                }
                $translations[] = new UnitTranslation($translate);
            }
            if (!empty($translations)) {
                $unit->translations()->saveMany($translations);
                $unit->save();
            }
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $unit;
    }
}
