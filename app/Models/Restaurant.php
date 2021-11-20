<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 */
class Restaurant extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'city_id'
    ];

}
