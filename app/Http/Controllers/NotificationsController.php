<?php

namespace App\Http\Controllers;

use App\JobNotification;
use App\NotificationVisit;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function getAllJobs()
    {
        $jobs = JobNotification::paginate(20);

        return view('jobs')->with(compact('jobs'));
    }

    public function getJob($slug)
    {
        $job = JobNotification::where('slug',$slug)->first();

        $visit = new NotificationVisit();

        $visit->notification_id = $job->id;

        $visit->save();

        return view('single_job')->with(compact('job'));
    }
}
