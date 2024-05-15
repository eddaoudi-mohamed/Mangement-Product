<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;
    protected $table = 'productes';
    protected $fillable = [
        'name', 'description', "category_id",
        "quantity", "image", "status", "price"
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function searchableAs(): string
    {
        return 'products_index';
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' =>  $this->category->name,
        ];
    }

    public  function fromdatetimefds($date)
    {

        $now = Carbon::now();
        $date = Carbon::parse($date);

        $diff = $now->diff($date);
        if ($diff->y > 0) {
            return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
        } elseif ($diff->m > 0) {
            return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        } elseif ($diff->d > 0) {
            if ($diff->d == 1) {
                return 'yesterday';
            } else {
                return $diff->d . ' days ago';
            }
        } elseif ($diff->h > 0) {
            return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        } elseif ($diff->i > 0) {
            return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        } else {
            return 'just now';
        }
    }
}
