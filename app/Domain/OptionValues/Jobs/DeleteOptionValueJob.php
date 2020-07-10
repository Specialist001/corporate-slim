<?php


namespace App\Domain\OptionValues\Jobs;


use App\Domain\OptionValues\Models\OptionValue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteOptionValueJob
{
    use Dispatchable, Queueable;

    /**
     * @var OptionValue
     */
    private $optionValue;

    public function __construct(OptionValue $optionValue)
    {
        $this->optionValue = $optionValue;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->optionValue->translations()->delete();
            $this->optionValue->delete();
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
