<?php

namespace LaraZeus\Core\Models;

use LaraZeus\Core\Models\HasUpdates;
use Database\Factories\CollectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUpdates;

    protected $fillable = ['name', 'values', 'user_id'];
    protected $casts = [
        'values' => 'array',
    ];


    public function getValuesListAttribute($value)
    {
        $someValues = '';
        $someValuesCount = 0;
        if ($this->values !== null) {
            $someValuesCount = collect($this->values)->count();
            $someValues = collect($this->values)
                ->take(5)->map(function (&$item) {
                    return $item['itemValue'] = '<span class="tager text-xs text-gray-700 font-semibold px-1.5 py-0.5 rounded-md">'.$item['itemValue'].'</span>';
                })
                ->join(' ');
        }
        $more = ($someValuesCount > 5) ? '...' : '';
        return $someValues.$more;
    }

    protected static function newFactory()
    {
        return CollectionFactory::new();
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }
}
