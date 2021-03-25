<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Variant;
use App\Productcategory;
use App\ProductVariant;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category()
    {
        return view('category');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products($id)
    {
        $result = Productcategory::where('category_id', $id)->leftJoin('products', 'productcategories.product_id', 'products.id')->get();
        $result = json_encode($result);
        return view('products')->with('data', $result);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productVariant($id)
    {
        $result = ProductVariant::where('product_id', $id)->leftJoin('variants', 'product_variants.variant_id', 'variants.id')->get();
        $data['id'] = $id;
        $data['variants'] = $result;
        $data = json_encode($data);
        return view('product_variant')->with('data', $data);;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addProductVariant($id)
    {
        $data['product_id'] = $id;
        $data = json_encode($data);
        return view('new_variant')->with('data', $data);;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function variants()
    {
        return view('variants');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function modifyCategory($id)
    {

        $result = Category::findOrFail($id);
        $result = json_encode($result);
        return view('new_category')->with('data', $result);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_product()
    {

        $result['categories'] = Category::all();
        $result = json_encode($result);
        return view('new_product')->with('data', $result);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function modifyProduct($id)
    {

        $result['item'] = Product::findOrFail($id);
        $result['categories'] = Category::all();
        $result['selected'] = Productcategory::where('product_id', $id)->select('category_id')->get();
        $result = json_encode($result);
        return view('new_product')->with('data', $result);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function modifyVariant($id)
    {
      $result = Variant::findOrFail($id);
      $result['id']  = $id;
      $result = json_encode($result);
      return view('new_variant')->with('data', $result);
    }
}
