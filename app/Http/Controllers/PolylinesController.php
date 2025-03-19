<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PolylineModel;

class PolylinesController extends Controller
{
    public function __construct()
    {
        $this->polyline = new  PolylineModel();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation request
        $request->validate(
            [
            'name' => 'required|unique:polylines,name',
            'description' => 'required',
            'geom_polyline' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Name already exists',
                'description.required' => 'Description is required',
                'geom_polyline.required' => 'Geometry polyline is required',
            ]);

        $data = [
            'geom' => $request->geom_polyline,
            'name' => $request->name,
            'description' => $request->description
        ];

        // create data
        if (!$this->polyline->create($data)) {
            return redirect()->route('map')->with('error', 'polyline failed to add');
        }

        // redicted to map
        return redirect()->route('map')->with('success', 'polyline has been added');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
