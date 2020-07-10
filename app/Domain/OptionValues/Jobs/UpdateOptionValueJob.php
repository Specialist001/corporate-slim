<?php


namespace App\Domain\OptionValues\Jobs;


use App\Domain\OptionValues\Models\OptionValue;
use App\Domain\OptionValues\Models\OptionValueTranslation;
use App\Domain\OptionValues\Requests\OptionValueRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateOptionValueJob
{
    use Queueable, Dispatchable;

    private $request;

    private $optionValue;

    /**
     * UpdateOptionValueJob constructor.
     * @param OptionValueRequest $request
     * @param OptionValue $optionValue
     */
    public function __construct(OptionValueRequest $request, OptionValue $optionValue)
    {
        $this->request = $request;
        $this->optionValue = $optionValue;
    }

    /**
     * @return OptionValue
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $optionValue = $this->optionValue;
            $optionValue->option_id = $this->request->input('option_id');
//            $optionValue->order = $this->request->input('order', 0);
            $optionValue->save();

            $optionValue->translations()->delete();
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
