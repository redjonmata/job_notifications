<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employer;
use App\Notification;
use App\NotificationVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $categories = Employer::select('category_id', DB::raw('count(*) as total'))
                            ->where('category_id','!=',1)
                            ->groupBy('category_id')
                            ->orderBy('total','DESC')
                            ->limit(8)
                            ->get();

        $locations = Employer::select('city')
                        ->where('city','!=','')
                        ->groupBy('city')
                        ->orderBy('city')
                        ->get();

        $dropCategories = Category::all();

        $companies = Notification::select('employer_id', DB::raw('count(*) as total'))
                                ->groupBy('employer_id')
                                ->orderBy('total','DESC')
                                ->limit(4)
                                ->get();

        $visits = NotificationVisit::select('notification_id', DB::raw('count(*) as total'))
                                    ->groupBy('notification_id')
                                    ->orderBy('total','DESC')
                                    ->limit(4)
                                    ->get();

        return view('welcome')->with(compact('categories','companies','visits','locations','dropCategories'));
    }

    public function home()
    {
        return view('home');
    }
}
