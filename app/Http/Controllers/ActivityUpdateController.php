<?php
namespace App\Http\Controllers;

use App\Models\ActivityUpdate;
use Illuminate\Http\Request;

class ActivityUpdateController extends Controller
{
    public function index()
    {
        // Get all updates, eager load related activity and user
        $activityUpdates = ActivityUpdate::with('activity', 'user')->get();

        // Pass to view
        return view('activity_updates', compact('activityUpdates'));
    }

    public function store(Request $request, Activity $activity)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,done',
            'remark' => 'nullable|string',
            'metadata' => 'nullable|array',
        ]);

        $user = $request->user();

        $update = ActivityUpdate::create([
            'activity_id' => $activity->id,
            'user_id' => $user->id,
            'status' => $data['status'],
            'remark' => $data['remark'] ?? null,
            'actor_name' => $user->name,
            'actor_email' => $user->email,
            'actor_title' => $user->title ?? null,
            'metadata' => $data['metadata'] ?? null,
        ]);

        return back()->with('success', 'Update saved.');
    }
}
