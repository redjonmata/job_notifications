<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $tasks = Notification::paginate(10);

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'employer_id' => 'required',
            'url' => 'nullable'
        ]);

        $task = Notification::create($request->all());

        return response()->json([
            'message' => 'New notification created!',
            'notification' => $task
        ]);
    }

    public function show($id)
    {
        $notification = Notification::find($id);

        return response()->json($notification);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'slug' => 'nullable',
            'description' => 'nullable',
            'employer_id' => 'nullable',
            'url' => 'nullable'
        ]);

        $notification = Notification::find($id);

        $notification->update($request->all());

        return response()->json([
            'message' => 'Notification updated!',
            'notification' => $notification
        ]);
    }

    public function destroy($id)
    {
        $notification = Notification::find($id);

        if (empty($notification)) {
            return response()->json([
                'message' => 'Couldn\'t delete notification. Notification does not exist!'
            ]);
        }

        $notification->delete();

        return response()->json([
            'message' => 'Successfully deleted notification!'
        ]);
    }
}
