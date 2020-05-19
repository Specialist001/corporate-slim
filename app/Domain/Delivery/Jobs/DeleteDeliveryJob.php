<?php

namespace App\Domain\Delivery\Jobs;

use Exception as ExceptionAlias;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Domain\Delivery\Models\Delivery;

class DeleteDeliveryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Delivery
     */
    protected $delivery;

    /**
     * Create a new job instance.
     *
     * @param Delivery $delivery
     */
    public function __construct(Delivery $delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws ExceptionAlias
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $this->delivery->delete();
        } catch (ExceptionAlias $exception) {
            \DB::rollBack();
            throw $exception;
        }
        \DB::commit();
    }
}
