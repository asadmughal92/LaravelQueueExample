<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Products;
use Illuminate\Support\Facades\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $productCount = Products::count();
        $postCount = Post::count();
        $jobCount = DB::table('failed_jobs')->count();


        return view('admin.dashboard', compact('productCount', 'jobCount','postCount'));
    }


    public function getPost(Request $request)
    {
       if ($request->ajax()) {
            $posts = Post::all();
            return response()->json($posts);
        }

        return view('admin.posts');
    }

    public function getProducts(Request $request)
    {
       if ($request->ajax()) {
            $products = Products::all();
            return response()->json($products);
        }

        return view('admin.products');
    }

    public function getJobs(Request $request)
    {
       if ($request->ajax()) {
            $jobs = DB::table('failed_jobs')->get();
            return response()->json($jobs);
        }

        return view('admin.jobs');
    }
}
