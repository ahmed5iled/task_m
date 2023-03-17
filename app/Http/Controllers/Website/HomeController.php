<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $page = 'Home';

        $sliders = Slider::all();

        $brands = Brand::all();

        $offers = Product::orderBy('id', 'desc')->where('offer', 'yes')->get();

        $new_arrivals = Product::orderBy('id', 'desc')->where('new_arrival', 'yes')->get();

        $most_views = Product::orderBy('id', 'desc')->where('most_view', 'yes')->get();

        return view('website.index', compact('page', 'offers', 'new_arrivals', 'most_views',
            'sliders', 'brands'));
    }


}
