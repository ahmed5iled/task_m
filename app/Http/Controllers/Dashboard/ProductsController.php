<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateProductsRequest;
use App\Http\Requests\Dashboard\UpdateProductsRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Yajra\DataTables\DataTables;


class ProductsController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.products.index');
    }

    public function show(DataTables $dataTables, Request $request)
    {
        $model = Product::orderBy('created_at', 'desc');

        return $dataTables->eloquent($model)->addIndexColumn()
            ->editColumn('created_at', function (Product $product) {
                return $product->created_at->format('d-m-Y h:i A');
            })
            ->addColumn('action', function (Product $product) {
                return view('dashboard.products.buttons', compact('product'));
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
        $categories = Category::all();

        $brands = Brand::all();

        return view('dashboard.products.create', compact('categories', 'brands'));
    }

    /**
     * @param CreateProductsRequest $request
     * @return RedirectResponse
     */
    public function store(CreateProductsRequest $request): RedirectResponse
    {
        Product::create($request->all());

        return redirect()->route('dashboard.products.index')->with(['status' => 'success', 'message' => 'Added Successfully']);

    }

    /**
     * @param Product $products
     * @return View
     */
    public function edit(Product $product): View
    {
        $categories = Category::all();

        $brands = Brand::all();

        return view('dashboard.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * @param UpdateProductsRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpdateProductsRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->all());

        return redirect()->route('dashboard.products.index')->with(['status' => 'success', 'message' => 'Updated Successfully']);

    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json(['status' => 'success', 'message' => 'Deleted Successfully']);
    }
}


