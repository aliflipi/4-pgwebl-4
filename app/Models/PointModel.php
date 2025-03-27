<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PointModel extends Model
{
    protected $table = 'points_tables';

    protected $guarded = ['id'];

    public function gejson_points()
    {
        $points = $this->select(DB::raw('id, ST_AsGeoJSON(geom) as geom, name, description, created_at, updated_at')) ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [], // Perbaikan dari 'feature' ke 'features'
        ];

        foreach ($points as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'name' => $p->name,
                    'description' => $p->description, // Perbaikan typo
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at, // Perbaikan dari update_at ke updated_at
                ],
            ];

            array_push($geojson['features'], $feature);
        }
        return $geojson;
    }
}
