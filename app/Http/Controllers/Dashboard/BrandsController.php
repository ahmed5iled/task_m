<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateBrandsRequest;
use App\Http\Requests\Dashboard\UpdateBrandsRequest;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

/**
 * Class BrandsController
 * @package App\Http\Controllers
 */
class BrandsController extends Controller
{
    /**
     * brandsController constructor.
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
        return view('dashboard.brands.index');
    }

    /**
     * @param DataTables $dataTables
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function show(DataTables $dataTables, Request $request)
    {
        $model = Brand::orderBy('created_at', 'desc');

        return $dataTables->eloquent($model)->addIndexColumn()
            ->editColumn('created_at', function (Brand $brand) {
                return $brand->created_at->format('d-m-Y h:i A');
            })
            ->addColumn('action', function (Brand $brand) {
                return view('dashboard.brands.buttons', compact('brand'));
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
        return view('dashboard.brands.create');
    }


    /**
     * @param CreateBrandsRequest $request
     * @return RedirectResponse
     */
    public function store(CreateBrandsRequest $request): RedirectResponse
    {
        $brand = Brand::create($request->all());

        return redirect()->route('dashboard.brands.index')->with(['status' => 'success', 'message' => 'Data added successfully']);

    }

    /**
     * @param Brand $brand
     * @return View
     */
    public function edit(Brand $brand): View
    {
        return view('dashboard.brands.edit', compact('brand'));
    }

    /**
     * @param UpdateBrandsRequest $request
     * @param Brand $brand
     * @return RedirectResponse
     */
    public function update(UpdateBrandsRequest $request, Brand $brand): RedirectResponse
    {
        $brand->update($request->all());

        return redirect()->route('dashboard.brands.index')->with(['status' => 'success', 'message' => 'Data updated successfully']);

    }

    /**
     * @param Brand $brand
     * @return JsonResponse
     */
    public function destroy(Brand $brand): JsonResponse
    {
        $brand->delete();

        return response()->json(['status' => 'success', 'message' => 'Data deleted successfully']);
    }
}
