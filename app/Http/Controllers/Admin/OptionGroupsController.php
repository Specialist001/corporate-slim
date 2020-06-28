<?php

namespace App\Http\Controllers\Admin;

use App\Domain\OptionGroups\Filters\OptionGroupFilter;
use App\Domain\OptionGroups\Jobs\DeleteOptionGroupJob;
use App\Domain\OptionGroups\Jobs\StoreOptionGroupJob;
use App\Domain\OptionGroups\Jobs\UpdateOptionGroupJob;
use App\Domain\OptionGroups\Models\OptionGroup;
use App\Domain\OptionGroups\Requests\OptionGroupRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filter = new OptionGroupFilter($request);
        $optionGroups = OptionGroup::withTranslation()->filter($filter)->paginateFilter();

        return view('admin.option-groups.index', [
            'optionGroups' => $optionGroups,
            'filters' => $filter->filters(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.option-groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OptionGroupRequest $request)
    {
        try {
            $this->dispatchNow(new StoreOptionGroupJob($request));
            return redirect()->route('admin.option-groups.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.option-groups.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\OptionGroups\Models\OptionGroup  $optionGroup
     * @return \Illuminate\Http\Response
     */
    public function show(OptionGroup $optionGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain\OptionGroups\Models\OptionGroup  $optionGroup
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(OptionGroup $optionGroup)
    {
        return view('admin.option-groups.edit',[
            'optionGroup' => $optionGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain\OptionGroups\Models\OptionGroup  $optionGroup
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OptionGroupRequest $request, OptionGroup $optionGroup)
    {
        try {
            $this->dispatchNow(new UpdateOptionGroupJob($request, $optionGroup));
            return redirect()->route('admin.option-groups.index')->with('success', trans('admin.flash.edited'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.option-groups.index')->with('error', trans('admin.flash.not_edited'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\OptionGroups\Models\OptionGroup  $optionGroup
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(OptionGroup $optionGroup)
    {
        try {
            $this->dispatchNow(new DeleteOptionGroupJob($optionGroup));
            return redirect()->route('admin.option-groups.index')->with('success', trans('admin.flash.destroyed'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.option-groups.index')->with('error', trans('admin.flash.not_destroyed'));
        }
    }
}
