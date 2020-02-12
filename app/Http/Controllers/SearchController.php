<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notification;
use Illuminate\Http\Request;
use function foo\func;

class SearchController extends Controller
{

    public function search(Request $request, $company = null)
    {
        $keyword = $request->get('keyword');
        $location = $request->get('location');
        $category = $request->get('category');
        $sort = $request->get('sort');

        $queryBuilder = Notification::with('employer');

        if (!empty($company)) {
            $queryBuilder->whereHas('employer',function ($employer) use ($company) {
                $employer->where('slug','=',$company);
            });

            if ($queryBuilder->count() <= 0) {
                abort('404','No Results Found');
            }
        }

        if (!empty($keyword)) {
            $queryBuilder->where('title','LIKE','%'.$keyword.'%')
                        ->orWhere('description','LIKE','%'.$keyword.'%')
                        ->orWhereHas('employer',function ($employer) use ($keyword) {
                            $employer->where('name','LIKE','%'.$keyword.'%');
                        });
        }

        if (!empty($location)) {
            $this->location($queryBuilder,$location);
        }

        if (!empty($category)) {
            $queryBuilder->where('category_id',$category);
        }

        if (!empty($sort)) {
            $this->sort($queryBuilder,$sort);
        }

        $count = $queryBuilder->get()->count();
        $jobs = $queryBuilder->orderBy('job_date','asc')->paginate(10)->appends([
            'location' => $location,
            'keyword' => $keyword,
            'sort' => $sort,
            'category' => $category,
            'company' => $company
        ]);

        $dropCategories = Category::all();

        $selectedCategory = 1;

        if ($category != '') {
            $selectedCategory = $dropCategories->filter(function ($item) use ($request) {
                return $item->id == $request->input('category');
            })->first()->name;
        }

        return view('jobs1')->with(compact('jobs','count','dropCategories','selectedCategory'));

    }

    private function sort($queryBuilder,$sort)
    {
        if ($sort == 'asc') {
            $queryBuilder->orderBy('job_date','ASC');
        }

        if ($sort == 'desc') {
            $queryBuilder->orderBy('job_date','DESC');
        }

        return $queryBuilder;
    }

    private function location($queryBuilder,$location)
    {
        return $queryBuilder->whereHas('employer', function ($job) use ($location) {
            $job->where('city','LIKE','%'.$location.'%')
                ->orWhere('country','LIKE','%'.$location.'%');
        });
    }
}
