<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateSlidersRequest;
use App\Http\Requests\Dashboard\UpdateSlidersRequest;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

/**
 * Class SlidersController
 * @package App\Http\Controllers
 */
class SlidersController extends Controller
{
    /**
     * SlidersController constructor.
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.sliders.index');
    }

    /**
     * @param DataTables $dataTables
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function show(DataTables $dataTables, Request $request)
    {
        $model = Slider::orderBy('created_at', 'desc');

        return $dataTables->eloquent($model)->addIndexColumn()
            ->editColumn('created_at', function (Slider $slider) {
                return $slider->created_at->format('d-m-Y h:i A');
            })
            ->addColumn('action', function (Slider $slider) {
                return view('dashboard.sliders.buttons', compact('slider'));
            })->rawColumns(['action'])
            ->startsWithSearch()
            ->filter(function ($query) use ($request) {
                if (request('search')['value']) {
                    $query->where('name', 'like', "%" . request('search')['value'] . "%");
                }
            })->make(true);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.sliders.create');
    }


    /**
     * @param CreateSlidersRequest $request
     * @return RedirectResponse
     */
    public function store(CreateSlidersRequest $request): RedirectResponse
    {
        $slider = Slider::create($request->all());

        return redirect()->route('dashboard.sliders.index')->with(['status' => 'success', 'message' => 'Data added successfully']);

    }

    /**
     * @param Slider $slider
     * @return View
     */
    public function edit(Slider $slider): View
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * @param UpdateSlidersRequest $request
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function update(UpdateSlidersRequest $request, Slider $slider): RedirectResponse
    {
        $slider->update($request->all());

        return redirect()->route('dashboard.sliders.index')->with(['status' => 'success', 'message' => 'Data updated successfully']);

    }

    /**
     * @param Slider $slider
     * @return JsonResponse
     */
    public function destroy(Slider $slider): JsonResponse
    {
        $slider->delete();

        return response()->json(['status' => 'success', 'message' => 'Data deleted successfully']);
    }
}
