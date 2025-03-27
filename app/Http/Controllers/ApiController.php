<?php

namespace App\Http\Controllers;

use App\Models\PointModel;
use App\Models\PolygonModel;
use Illuminate\Http\Request;
use App\Models\PolylineModel;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->points = new  PointModel();
        $this->polylines = new  PolylineModel();
        $this->polygons = new  PolygonModel();
    }

    public function points()
    {
        $points = $this->points->gejson_points();

        return response()->json($points);
    }

    public function polylines()
    {
        $polylines = $this->polylines->gejson_polylines();

        return response()->json($polylines, 200, [], JSON_NUMERIC_CHECK);
    }

    public function polygons()
    {
        $polygons = $this->polygons->gejson_polygons();

        return response()->json($polygons, 200, [], JSON_NUMERIC_CHECK);
    }


}
