<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateCategoriesRequest;
use App\Http\Requests\Dashboard\UpdateCategoriesRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller
{
    /**
     * CategoriesController constructor.
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
        return view('dashboard.categories.index');
    }

    public function show(DataTables $dataTables, Request $request)
    {
        $model = Category::orderBy('created_at', 'desc');

        return $dataTables->eloquent($model)->addIndexColumn()
            ->editColumn('created_at', function (Category $category) {
                return $category->created_at->format('d-m-Y h:i A');
            })
            ->editColumn('parent_id', function (Category $category) {
                return $category->parent->name ?? 'Main';
            })->addColumn('action', function (Category $category) {
                return view('dashboard.categories.buttons', compact('category'));
            })->rawColumns(['action'])
            ->startsWithSearch()
            ->filter(function ($query) {
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
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('dashboard.categories.create', compact('categories'));

    }


    /**
     * @param CreateCategoriesRequest $request
     * @return RedirectResponse
     */
    public function store(CreateCategoriesRequest $request): RedirectResponse
    {
        Category::create($request->all());

        return redirect()->route('dashboard.categories.index')->with(['status' => 'success', 'message' => 'Added Successfully']);

    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        $categories = Category::where('id', '!=', $category->id)->orderBy('created_at', 'desc')->get();

        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    /**
     * @param UpdateCategoriesRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoriesRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->all());

        return redirect()->route('dashboard.categories.index')->with(['status' => 'success', 'message' => 'Updated Successfully']);

    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(['status' => 'success', 'message' => 'Deleted Successfully']);
    }
}
