<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{


    public function index()
    {
        $histories = History::all();

        $histories = $histories->groupBy(function ($record) {
            $carbonDate = Carbon::parse($record->created_at);
            if ($carbonDate->isToday()) {
                return 'Today';
            }
            if ($carbonDate->isYesterday()) {
                return 'Yesterday';
            }
            return $carbonDate->format('Y-m-d');
        })->sortByDesc(function ($group, $date) {
            return strtotime($date);
        });
        // $histories = array_reverse($histories);
        return view('Histories.index', compact('histories'));
    }

    public  function delete(Request $request, $id)
    {
    }
}
