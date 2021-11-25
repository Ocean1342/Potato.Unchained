<?php
declare(strict_types=1);

namespace App\Services\GeoService;

use App\Models\Restaurant;
use Location\Coordinate;
use Location\Distance\Vincenty;

class GeoPoints
{
    public static function sortByClosest(float $lat, float $lon): array
    {
        $userPoint = new Coordinate($lat, $lon);
        $rests = Restaurant::with('city')->get();
        $calculator = new Vincenty();
        $arResult = [];
        foreach ($rests as $rest) {
            $curPoint = new Coordinate((float)$rest->latitude, (float)$rest->longitude);
            $arResult[] = [
                'title' => $rest->title,
                'city' => $rest->city->name,
                'city_id' => $rest->city->id,
                'distance' => $calculator->getDistance($userPoint, $curPoint)
            ];
        }
        $arResult = collect($arResult)->sortBy('distance');
        return $arResult->toArray();
    }

    public static function prettyPrint(array $closest): string
    {
        $returnString = '';
        $count = 1;
        foreach ($closest as $rest) {
            $returnString .= $rest['title'] . PHP_EOL . '(' . $rest['city'] . ') ' . PHP_EOL . ' distance: '
                . round($rest['distance']) . ' meters' . PHP_EOL . PHP_EOL;
            $count++;
        }
        return $returnString;
    }
}
