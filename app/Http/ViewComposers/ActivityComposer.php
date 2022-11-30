<?php



namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\BlogPost;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class ActivityComposer
{
    public function compose(View $view)
    {
        $time = now()->addMinutes(60);
        $mostCommented = Cache::tags(['blog-post'])->remember('blog-post-mostCommented', $time, function () {
            return BlogPost::mostCommented()->take(5)->get();
            // return BlogPost::mostCommented()->take(5)->get();
        });
        $mostActive = Cache::remember('blog-post-mostActive', $time, function () {
            return User::withMostBlogPosts()->take(3)->get();
        });
        $mostActiveLastMonth = Cache::remember('blog-post-mostActiveLastMonth', $time, function () {
            return User::WithMostBlogPostsLastMonth()->take(5)->get();
        });
        $sortBy = ["Name", "Type", "Manufacturer", "Sales", "Price Range"];
        $mostDiscounted = Products::orderBy("discount", 'desc')->limit(5)->get();
        $bigVendors = Products::orderBy("sales", 'desc')->with("user")->get();
        foreach ($bigVendors as $vendor) {
            $vendor->user_name = User::findOrFail($vendor->user_id)->name;
            $vendor->is_admin = User::findOrFail($vendor->user_id)->is_admin;
        }

        // $mostCommentedProducts = Cache::tags(['products'])->remember('products-mostCommented', $time, function () {
        //     return Products::mostCommented()->take(5)->get();
        //     // return BlogPost::mostCommented()->take(5)->get();
        // });
        // $view->with('mostCommentedProducts', $mostCommentedProducts);

        $view->with('sortBy', $sortBy);
        $view->with("mostDiscount", $mostDiscounted);
        $view->with("bigVendors", $bigVendors);
        $view->with('bestSeller', $bigVendors);
        $view->with('mostCommented', $mostCommented);
        $view->with('mostActive', $mostActive);
        $view->with('mostActiveLastMonth', $mostActiveLastMonth);
    }
}
