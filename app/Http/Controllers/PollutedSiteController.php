<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollutedSite;
use App\Models\User;

class PollutedSiteController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'S_Name' => 'required|string|max:255',
            'Pollutant_type' => 'required|string|max:255',
            'Region' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'Level_of_PH' => 'required|numeric',
            'Amount_of_waste_materials' => 'required|numeric',
        ]);

      

        $pollutedSite = PollutedSite::create($validatedData);

        return response()->json($pollutedSite, 201);
    }

    public function index()
    {
        $pollutedSites = PollutedSite::all();

        return response()->json($pollutedSites);
    }
}
