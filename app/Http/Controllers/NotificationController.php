<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::paginate(10);

        return NotificationResource::collection($notifications);
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'title' => 'required|max:255',
//            'slug' => 'required|max:255',
//            'description' => 'required',
//            'employer_id' => 'required',
//            'category_id' => 'required',
//            'url' => 'nullable',
//            'is_by_jobnet' => 'nullable',
//        ]);

        $notification = 'test';

        return response()->json([
            'message' => 'New notification created!',
            'notification' => $notification
        ],200);
    }

    public function show($id)
    {
        $notification = Notification::find($id);

        if (empty($notification)) {
            return response()->json([
                'message' => 'Notification does not exist'
            ],404);
        }

        return new NotificationResource($notification->fresh());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'slug' => 'nullable',
            'description' => 'nullable',
            'employer_id' => 'nullable',
            'url' => 'nullable',
            'is_by_jobnet' => 'nullable',
        ]);

        $notification = Notification::find($id);

        $notification->update($request->all());

        return response()->json([
            'message' => 'Notification updated!',
            'notification' => new NotificationResource($notification->fresh())
        ],200);
    }

    public function destroy($id)
    {
        $notification = Notification::find($id);

        if (empty($notification)) {
            return response()->json([
                'message' => 'Couldn\'t delete notification. Notification does not exist!'
            ],404);
        }

        $notification->delete();

        return response()->json([
            'message' => 'Successfully deleted notification!'
        ]);
    }
}
