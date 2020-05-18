<?php

namespace App\Domain\Delivery\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Domain\Delivery\Models\Delivery;
use App\Domain\Delivery\Requests\DeliveryRequest;

class DeliveryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var DeliveryRequest
     */
    protected $request;

    /**
     * @var Delivery
     */
    protected $delivery;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(DeliveryRequest $request, Delivery $delivery = null)
    {
        $this->request = $request;
        $this->delivery = $delivery;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \DB::beginTransaction();
        try {
            $delivery = $this->delivery ?? new Delivery();
            $delivery->name = $this->request->input('name');
            $delivery->price = $this->request->input('price', 0);
            $delivery->active = $this->request->input('active');

            $delivery->schedule = json_encode(array_filter($this->request->input('phones', [])));
            $delivery->phones = json_encode(array_filter($this->request->input('phones', [])));
            $delivery->emails = json_encode(array_filter($this->request->input('emails', [])));

            $delivery->location_lat = $this->request->input('location_lat', null);
            $delivery->location_lng = $this->request->input('location_lng', null);

            $delivery->schedule = json_encode(array_filter($this->request->input('schedule', [])));
            // $delivery->schedule = null;
            // $days = $this->request->input('Days', '0');
            // $time = $this->request->input('Time', '0');
            // $alltime = $this->request->input('AllTime', '0');

            // $delivery->schedule = json_encode(array_filter(['days' => $days, 'time' => $time, 'alltime' => $alltime]));

            $delivery->save();
        } cartch (\Exception $exception) {
            \DB::rollback();
            throw $exception;
        }
        \DB::commit();

        return $delivery;
    }
}
