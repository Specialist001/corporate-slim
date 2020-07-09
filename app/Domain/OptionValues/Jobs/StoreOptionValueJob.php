<?php


namespace App\Domain\OptionValues\Jobs;


use App\Domain\OptionValues\Models\OptionValue;
use App\Domain\OptionValues\Models\OptionValueTranslation;
use App\Domain\OptionValues\Requests\OptionValueRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreOptionValueJob
{
    use Queueable, Dispatchable;

    private $request;

    /**
     * UpdateOptionValueJob constructor.
     * @param OptionValueRequest $request
     */
    public function __construct(OptionValueRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return OptionValue
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $optionValue = new OptionValue();
            $optionValue->option_id = $this->request->input('option_id');
            $optionValue->order = $this->request->input('order', 0);
            $optionValue->save();

            $translations = [];
            foreach ($this->request->input('translations', []) as $translate) {
                if ($translate['name'] == '') {
                    continue;
                }
                $translations[] = new OptionValueTranslation($translate);
            }
            if (!empty($translations)) {
                $optionValue->translations()->saveMany($translations);
                $optionValue->save();
            }

        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();

        return $optionValue;
    }

}
