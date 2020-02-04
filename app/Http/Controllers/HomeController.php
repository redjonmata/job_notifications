<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employer;
use App\Helpers\Helper;
use App\JobNotification;
use App\NotificationVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $employers = Employer::select('field', DB::raw('count(*) as total'))
                            ->where('field','!=','')
                            ->where('field','!=','-')
                            ->groupBy('field')
                            ->orderBy('total','DESC')
                            ->get();

        $categories = $employers->filter(function ($item) {
            return Helper::trimNumber($item->field) !== false;
        })->take(8);

        $locations = Employer::select('city')
                        ->where('city','!=','')
                        ->groupBy('city')
                        ->orderBy('city')
                        ->get();

        $dropCategories = Category::all();

        $companies = JobNotification::select('employer_name', DB::raw('count(*) as total'))
                                ->groupBy('employer_name')
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
}
