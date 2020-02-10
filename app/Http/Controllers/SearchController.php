<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use function foo\func;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $location = $request->get('location');
        $category = $request->get('category');
        $sort = $request->get('sort');

        $queryBuilder = Notification::with('employer');

        if ($keyword != '') {
            $queryBuilder->where('title','LIKE','%'.$keyword.'%')
                        ->orWhereHas('employer',function ($employer) use ($keyword) {
                            $employer->where('name','LIKE','%'.$keyword.'%');
                        })
                        ->orWhere('description','LIKE','%'.$keyword.'%');
        }

        if ($location != '') {
            $this->location($queryBuilder,$location);
        }

        if ($category != '') {
            $queryBuilder->where('category_id',$category);
        }

        if ($sort != '') {
            $this->sort($queryBuilder,$sort);
        }

        $jobs = $queryBuilder->get();

        return view('jobs1')->with(compact('jobs'));

    }

    private function sort($queryBuilder,$sort)
    {
        if ($sort == 'newest') {
            $queryBuilder->sortBy('job_date','ASC');
        }

        if ($sort == 'oldest') {
            $queryBuilder->sortBy('job_date','DESC');
        }

        return $queryBuilder;
    }

    private function location($queryBuilder,$location)
    {
        return $queryBuilder->whereHas('employer', function ($job) use ($location) {
            $job->where('location','LIKE','%'.$location.'%');
        });
    }
}
