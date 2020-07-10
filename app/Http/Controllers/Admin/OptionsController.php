<?php

namespace App\Http\Controllers\Admin;

use App\Domain\OptionGroups\Models\OptionGroup;
use App\Domain\Options\Filters\OptionFilter;
use App\Domain\Options\Jobs\DeleteOptionJob;
use App\Domain\Options\Jobs\StoreOptionJob;
use App\Domain\Options\Jobs\UpdateOptionJob;
use App\Domain\Options\Models\Option;
use App\Domain\Options\Requests\OptionRequest;
use App\Domain\OptionValues\Jobs\DeleteOptionValueJob;
use App\Domain\OptionValues\Jobs\StoreOptionValueJob;
use App\Domain\OptionValues\Jobs\UpdateOptionValueJob;
use App\Domain\OptionValues\Models\OptionValue;
use App\Domain\OptionValues\Requests\OptionValueRequest;
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

    public function createOptionValue(Option $option)
    {
        return view('component.translations', [
            'form' => 'admin.options._option_value_translations_form',
            'model' => new OptionValue(),
            'label' => '_optionValue',
            'formContent' => [
                'id' => 'optionValues',
                'option_id' => 'option_id',
                'option_id_value' => $option->id ?? null,
                'value_id' => 'id',
            ],
        ]);
    }
    public function getOptionValue(OptionValue $optionValue)
    {
        return view('component.translations', [
            'form' => 'admin.options._option_value_translations_form',
            'model' => $optionValue ?? null,
            'label' => $optionValue->id ?? '_optionValue',
            'formContent' => [
                'id' => 'optionValues',
                'option_id' => 'option_id',
                'option_id_value' => $optionValue->option_id ?? null,
                'value_id' => 'id',
            ],
            'isOld' => true,
        ]);
    }

    public function addOptionValue(OptionValueRequest $request)
    {
        try {
            $value = $this->dispatchNow(new StoreOptionValueJob($request));
            return response()->json($value, 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }

    /**
     * @param OptionValueRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOptionValue(OptionValueRequest $request)
    {
        $optionValue = OptionValue::where(['id'=>$request->id])->first();
        try {
            $value = $this->dispatchNow(new UpdateOptionValueJob($request, $optionValue));
            return response()->json($value, 200);

        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }

    /**
     * @param OptionValue $optionValue
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOptionValue(OptionValue $optionValue)
    {
        try {
            $this->dispatchNow(new DeleteOptionValueJob($optionValue));
            return response()->json('deleted', 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }
}
