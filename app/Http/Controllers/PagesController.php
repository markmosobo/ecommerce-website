<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\About;
use App\Models\Contact;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('created_at')->get();
        //featured based on sales
        $featuredproducts = Product::inRandomOrder()->limit(8)->get();
        $bestsellingproducts = Product::orderByDesc('sold')->limit(10)->get();
        $featureimage = Product::inRandomOrder()->limit(1)->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $womencategories = Category::where('sex', 'F')->take(8)->get();
        $mencategories = Category::where('sex', 'M')->take(8)->get();
        $salecategories = Category::where('sex', 'U')->take(8)->get();
        $mennewarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $womennewarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $newarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $menproducts = Product::all();
        $womenproducts = Product::all();
        $trendingproducts = Product::all();
        $contacts = Contact::all();
        return view('index', compact('categories', 'featuredproducts','bestsellingproducts','featureimage',
        'topcategories','womencategories','mencategories','salecategories',
        'menproducts','womenproducts','trendingproducts','mennewarrivals','womennewarrivals',
        'newarrivals','contacts'));
    }

    public function products()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('pages.products', compact('products', 'categories'));
    }

    public function contact()
    {
        $featuredproducts = Product::inRandomOrder()->limit(8)->get();
        $bestsellingproducts = Product::orderByDesc('sold')->limit(10)->get();
        $featureimage = Product::inRandomOrder()->limit(1)->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $womencategories = Category::where('sex', 'F')->take(8)->get();
        $mencategories = Category::where('sex', 'M')->take(8)->get();
        $salecategories = Category::where('sex', 'U')->take(8)->get();
        $mennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $womennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $newarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $menproducts = Product::all();
        $womenproducts = Product::all();
        $trendingproducts = Product::all();
        $contacts = Contact::all();
        return view('pages.contact', compact('featuredproducts','bestsellingproducts','featureimage',
        'topcategories','womencategories','mencategories','salecategories',
        'menproducts','womenproducts','trendingproducts','mennewarrivals','womennewarrivals',
        'newarrivals','contacts'));
    }

    public function about()
    {
        $featuredproducts = Product::inRandomOrder()->limit(8)->get();
        $bestsellingproducts = Product::orderByDesc('sold')->limit(10)->get();
        $featureimage = Product::inRandomOrder()->limit(1)->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $womencategories = Category::where('sex', 'F')->take(8)->get();
        $mencategories = Category::where('sex', 'M')->take(8)->get();
        $salecategories = Category::where('sex', 'U')->take(8)->get();
        $mennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $womennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $newarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $menproducts = Product::all();
        $womenproducts = Product::all();
        $trendingproducts = Product::all();
        $contacts = Contact::all();
        $abouts = About::all();
        return view('pages.about', compact('featuredproducts','bestsellingproducts','featureimage',
        'topcategories','womencategories','mencategories','salecategories',
        'menproducts','womenproducts','trendingproducts','mennewarrivals','womennewarrivals',
        'newarrivals','abouts','contacts'));
    }

    public function faq()
    {
        $featuredproducts = Product::inRandomOrder()->limit(8)->get();
        $bestsellingproducts = Product::orderByDesc('sold')->limit(10)->get();
        $featureimage = Product::inRandomOrder()->limit(1)->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $womencategories = Category::where('sex', 'F')->take(8)->get();
        $mencategories = Category::where('sex', 'M')->take(8)->get();
        $salecategories = Category::where('sex', 'U')->take(8)->get();
        $mennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $womennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $newarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $menproducts = Product::all();
        $womenproducts = Product::all();
        $trendingproducts = Product::all();
        $contacts = Contact::all();
        return view('pages.faq', compact('featuredproducts','bestsellingproducts','featureimage',
        'topcategories','womencategories','mencategories','salecategories',
        'menproducts','womenproducts','trendingproducts','mennewarrivals','womennewarrivals',
        'newarrivals','contacts'));
    }

    public function singleProduct($id)
    {
        $singleproduct = Product::find($id);
        $featuredproducts = Product::inRandomOrder()->limit(8)->get();
        $bestsellingproducts = Product::orderByDesc('sold')->limit(10)->get();
        $featureimage = Product::inRandomOrder()->limit(1)->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $womencategories = Category::where('sex','=', 'F')->take(8)->get();
        $mencategories = Category::where('sex', 'M')->take(8)->get();
        $salecategories = Category::where('sex', 'U')->take(8)->get();
        $mennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $womennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $newarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $menproducts = Product::all();
        $womenproducts = Product::all();
        $trendingproducts = Product::all();
        $relatedproducts = Product::all()->where('category_id', $singleproduct->category_id)->except($singleproduct->id);
        $contacts = Contact::all();
        $products = Product::all();
        return view('pages.singleproduct', [
            'featuredproducts' => $featuredproducts,
            'bestsellingproducts' => $bestsellingproducts,
            'featureimage' => $featureimage,
            'topcategories' => $topcategories,
            'womencategories' => $womencategories,
            'mencategories' => $mencategories,
            'salecategories' => $salecategories,
            'menproducts' => $menproducts,
            'womenproducts' => $womenproducts,
            'trendingproducts' => $trendingproducts,
            'mennewarrivals' => $mennewarrivals,
            'womennewarrivals' => $womennewarrivals,
            'newarrivals' => $newarrivals,
            'singleproduct' => $singleproduct,
            'relatedproducts' => $relatedproducts,
            'products' => $products
        ]);
    }

    public function singleCategory($id)
    {
        $categoryId = Category::findOrFail($id);
        $products = Product::where('category_id', $categoryId->id)->paginate(20);
        $popularproducts = Product::orderByDesc('sold')->take(5)->get();
        $categories = Category::all();
        $featuredproducts = Product::inRandomOrder()->limit(8)->get();
        $bestsellingproducts = Product::orderByDesc('sold')->limit(10)->get();
        $featureimage = Product::inRandomOrder()->limit(1)->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $womencategories = Category::where('sex', 'F')->take(8)->get();
        $mencategories = Category::where('sex', 'M')->take(8)->get();
        $salecategories = Category::where('sex', 'U')->take(8)->get();
        $mennewarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $womennewarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $newarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $menproducts = Product::all();
        $womenproducts = Product::all();
        $trendingproducts = Product::all();
        $contacts = Contact::all();
        return view('pages.categoryproducts', compact('products', 'categories','featuredproducts','bestsellingproducts','featureimage',
        'topcategories','womencategories','mencategories','salecategories',
        'menproducts','womenproducts','trendingproducts','mennewarrivals','womennewarrivals',
        'newarrivals','contacts','categoryId','popularproducts'));
    }

    public function registerSeller()
    {
        return view('pages.register');
    }

    public function checkout()
    {
        $categories = Category::orderByDesc('created_at')->get();
        //featured based on sales
        $featuredproducts = Product::inRandomOrder()->limit(8)->get();
        $bestsellingproducts = Product::orderByDesc('sold')->limit(10)->get();
        $featureimage = Product::inRandomOrder()->limit(1)->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $womencategories = Category::where('sex', 'F')->take(8)->get();
        $mencategories = Category::where('sex', 'M')->take(8)->get();
        $salecategories = Category::where('sex', 'U')->take(8)->get();
        $mennewarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $womennewarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $newarrivals = Product::with('category')->orderByDesc('created_at')->take(5)->get();
        $menproducts = Product::all();
        $womenproducts = Product::all();
        $trendingproducts = Product::all();
        $contacts = Contact::all();
        return view('pages.checkout', compact('categories', 'featuredproducts','bestsellingproducts','featureimage',
        'topcategories','womencategories','mencategories','salecategories',
        'menproducts','womenproducts','trendingproducts','mennewarrivals','womennewarrivals',
        'newarrivals','contacts'));  
    }
}
