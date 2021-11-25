<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Restaurant
 *
 * @method static \Database\Factories\RestaurantFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $city_id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereTitle($value)
 * @property string $latitude
 * @property string $longitude
 * @property-read \App\Models\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLongitude($value)
 */
class Restaurant extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'city_id'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function dishes(): HasMany
    {
        return $this->HasMany(Dish::class);
    }

/*    public function city(): HasOne
    {
        return $this->hasOne(City::class);
    }*/
}
