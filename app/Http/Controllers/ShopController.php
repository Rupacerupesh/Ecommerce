<?php



namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Color;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        if(Session::has('customer'))
            $this->middleware('auth');
        

    }


    public function index()
    {   
        $pagination = 11;
        $categories = Category::all();

        if(Session::has('customer'))
        {
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category)->where('wholesale',true);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true)->where('wholesale',true);
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }
    else
        {
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category)->where('retail',true);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true)->where('retail',true);
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

}

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(Session::has('customer'))
        $product = Product::where('slug', $slug)->where('wholesale',true)->firstOrFail();
        else
        $product = Product::where('slug', $slug)->where('retail',true)->firstOrFail();

        $category = $product->categories->first()->name;
        $categories = $product->categories();

        $truncated = str_limit($category, 4, '');

        if(Session::has('customer'))
        $mightAlsoLike = Product::where('slug','like',"%$truncated%")->where('wholesale',true)->where('slug', '!=', $slug)->mightAlsoLike()->get();
        else
        $mightAlsoLike = Product::where('slug','like',"%$truncated%")->where('retail',true)->where('slug', '!=', $slug)->mightAlsoLike()->get();

                $allColors = Color::all();


                $colorsForProduct = $product->colors()->get();
                return view('product')->with([
                    'product' => $product,
                    'mightAlsoLike' => $mightAlsoLike,
                    'categories' => $categories,
                    'allColors' => $allColors,
                    'colorsForProduct' => $colorsForProduct,
                ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        // $products = Product::where('name', 'like', "%$query%")
        //                    ->orWhere('details', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")
        //                    ->paginate(10);
        if(Session::has('customer'))
        $products = Product::search($query)->where('wholesale',true)->paginate(5);
        else
        $products = Product::search($query)->where('retail',true)->paginate(5);


        return view('search-results')->with('products', $products);
    }


    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
