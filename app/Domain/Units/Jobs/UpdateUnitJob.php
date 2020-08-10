<?php

namespace App\Domain\Units\Jobs;

use App\Domain\Units\Models\Unit;
use App\Domain\Units\Models\UnitTranslation;
use App\Domain\Units\Requests\UnitRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateUnitJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    private $request;
    private $unit;

    /**
     * Create a new job instance.
     *
     * @param UnitRequest $request
     * @param Unit $unit
     */
    public function __construct(UnitRequest $request, Unit $unit)
    {
        $this->request = $request;
        $this->unit = $unit;
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
            $unit = $this->unit;

            $unit->translations()->delete();
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
