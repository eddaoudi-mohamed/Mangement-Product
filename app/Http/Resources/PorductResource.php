<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PorductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'category_name' => $this->category->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'updateAt' => function () {
                $now = Carbon::now();
                $date = Carbon::parse($this->updated_at);
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
        ];
    }
}
