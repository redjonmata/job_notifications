<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notification;
use App\NotificationVisit;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAllJobs()
    {
        $jobs = Notification::paginate(10);
        $dropCategories = Category::where('id','!=',1)->get();

        return view('jobs1')->with(compact('jobs','dropCategories'));
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
