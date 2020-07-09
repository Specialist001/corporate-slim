<?php

namespace App\Http\Controllers\Admin;

use App\Domain\OptionGroups\Models\OptionGroup;
use App\Domain\Options\Filters\OptionFilter;
use App\Domain\Options\Jobs\DeleteOptionJob;
use App\Domain\Options\Jobs\StoreOptionJob;
use App\Domain\Options\Jobs\UpdateOptionJob;
use App\Domain\Options\Models\Option;
use App\Domain\Options\Requests\OptionRequest;
use App\Domain\OptionValues\Models\OptionValue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View|void
     */
    public function index(Request $request)
    {
        $filter = new OptionFilter($request);
        $options = Option::withTranslation()->filter($filter)->paginateFilter();

        $optionTypes = Option::types();
        $optionGroups = OptionGroup::withTranslation()->get();
//        dd($options);

        return view('admin.options.index', [
            'options' => $options,
            'filters' => $filter->filters(),
            'optionTypes' => $optionTypes,
            'optionGroups' => $optionGroups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $optionGroups = OptionGroup::withTranslation()->get();
        $optionTypes = Option::types();

        return view('admin.options.create', [
            'optionGroups' => $optionGroups,
            'optionTypes' => $optionTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OptionRequest $request)
    {
        try {
            $this->dispatchNow(new StoreOptionJob($request));
            return redirect()->route('admin.options.index')->with('success', trans('admin.flash.created'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.options.index')->with('error', trans('admin.flash.not_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\Options\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain\Options\Models\Option  $option
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Option $option)
    {
        $optionGroups = OptionGroup::withTranslation()->get();
        $optionTypes = Option::types();

        return view('admin.options.edit', [
            'option' => $option,
            'optionGroups' => $optionGroups,
            'optionTypes' => $optionTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain\Options\Models\Option  $option
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OptionRequest $request, Option $option)
    {
        try {
            $this->dispatchNow(new UpdateOptionJob($request, $option));
            return redirect()->route('admin.options.index')->with('success', trans('admin.flash.edited'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.options.index')->with('error', trans('admin.flash.not_edited'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\Options\Models\Option  $option
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Option $option)
    {
        try {
            $this->dispatchNow(new DeleteOptionJob($option));
            return redirect()->route('admin.options.index')->with('success', trans('admin.flash.destroyed'));
        } catch (\Exception $exception) {
            return redirect()->route('admin.options.index')->with('error', trans('admin.flash.not_destroyed'));
        }
    }

    public function getOptionValue(OptionValue $optionValue)
    {
        return view('component.translations', [
            'form' => 'admin.options._option_value_translations_form',
            'model' => $optionValue ?? null,
            'label' => $optionValue->id ?? null,
            'formContent' => [
                'id' => 'optionValues',
                'option_id' => 'option_id',
                'option_id_value' => $optionValue->option_id ?? null,
                'value_id' => 'option_value',
            ],
        ]);
    }

    public function putOptionValue()
    {
        return json_encode(1);
    }
}
