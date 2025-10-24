<?php
namespace App\Http\Controllers;

use App\Models\ActivityUpdate;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function history(Request $request)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
            'activity_id' => 'nullable|integer|exists:activities,id',
            'user_id' => 'nullable|integer|exists:users,id',
        ]);

        $query = ActivityUpdate::with(['activity','user'])
            ->whereBetween('created_at', [$request->from, $request->to . ' 23:59:59']);

        if ($request->activity_id) $query->where('activity_id', $request->activity_id);
        if ($request->user_id) $query->where('user_id', $request->user_id);

        $results = $query->orderBy('created_at', 'desc')->get();

        return view('reports.history', compact('results'));
    }
}
