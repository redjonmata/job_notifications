<?php

namespace App\Http\Controllers;

use App\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::paginate(10);

        return response()->json($employers,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'city' => 'nullable',
            'country' => 'nullable',
            'phone' => 'nullable',
            'mobile_phone' => 'nullable',
            'fax' => 'nullable',
            'category_id' => 'required',
            'image' => 'nullable',
        ]);

        $employer = Employer::create($request->all());

        return response()->json([
            'message' => 'New employer created!',
            'employer' => $employer
        ],201);
    }

    public function show($id)
    {
        $employer = Employer::find($id);

        return response()->json($employer,200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable',
            'slug' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
            'mobile_phone' => 'nullable',
            'fax' => 'nullable',
            'category_id' => 'nullable',
            'image' => 'nullable',
        ]);

        $employer = Employer::find($id);

        $employer->update($request->all());

        return response()->json([
            'message' => 'employer updated!',
            'employer' => $employer
        ],200);
    }
}
