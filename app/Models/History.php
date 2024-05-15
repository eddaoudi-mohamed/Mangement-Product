<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    protected  $fillable = ['action_name', 'item_name', 'table_name', 'id_item'];


    function formatDateHistory($date)
    {
        $carbonDate = Carbon::parse($date);

        if ($carbonDate->isToday()) {
            return 'Today';
        }

        if ($carbonDate->isYesterday()) {
            return 'Yesterday';
        }

        return $carbonDate->format('Y-m-d');
    }
}
