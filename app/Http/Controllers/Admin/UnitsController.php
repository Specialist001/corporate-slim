<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Units\Filters\UnitFilter;
use App\Domain\Units\Jobs\DeleteUnitJob;
use App\Domain\Units\Jobs\StoreUnitJob;
use App\Domain\Units\Jobs\UpdateUnitJob;
use App\Domain\Units\Models\Unit;
use App\Domain\Units\Requests\UnitRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $filter = new UnitFilter($request);
        $units = Unit::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.units.index', [
            'units' => $units,
            'filters' => $filter->filters(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        try {
            $this->dispatchNow(new StoreUnitJob($request));
            return redirect()->route('admin.units.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.units.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param UnitRequest $request
     * @param \App\Domain\Units\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain\Units\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('admin.units.edit', [
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitRequest $request
     * @param \App\Domain\Units\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, Unit $unit)
    {
        try {
            $this->dispatchNow(new UpdateUnitJob($request, $unit));
            return redirect()->route('admin.units.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.units.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\Units\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        try {
            $this->dispatchNow(new DeleteUnitJob($unit));
            return redirect()->route('admin.units.index')->with('success', trans('admin.flash.destroyed'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.units.index')->with('danger', trans('admin.flash.not_destroyed'));
        }
    }
}
