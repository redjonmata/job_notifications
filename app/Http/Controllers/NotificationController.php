<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notification;
use App\NotificationVisit;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAllJobs(Request $request)
    {
        $count = Notification::all()->count();
        $jobs = Notification::paginate(10);
        $dropCategories = Category::where('id','!=',1)->get();
        $selectedCategory = 'Select Category';

        return view('jobs1')->with(compact('jobs','count','dropCategories','selectedCategory'));
    }

    public function getJob($slug)
    {
        $job = Notification::where('slug',$slug)->first();

        $visit = new NotificationVisit();

        $visit->notification_id = $job->id;

        $visit->save();

        return view('single_job')->with(compact('job'));
    }
}
