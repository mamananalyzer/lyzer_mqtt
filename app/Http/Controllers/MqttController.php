<?php

namespace App\Http\Controllers;

use App\Models\MQTT;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Support\Str;

class MqttController extends Controller
{

    public function getData()
    {
        // Your data retrieval logic here
        $data = [10, 20, 30, 40, 50];

        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mqttRecords = MQTT::where('device_name', 'Inverter 7')->get();
        $timestamps = $mqttRecords->pluck('timestamp')->map(function ($timestamp) {
            return Carbon::createFromTimestamp($timestamp)->timezone('Asia/Jakarta')->format('H:i');
        });

        $activePowers = MQTT::where('device_name', 'Inverter 7')->get();
        $activePowers = $activePowers->pluck('ActivePower')->map(function ($power) {
            return (float) Str::before($power, '_kW');
        });
        
        // dd($activePowers);
        return view('mqtt.index')->with(compact('timestamps', 'activePowers'));
    }

    public function filterByInverter($inverterNumber)
    {
        $mqttRecords = MQTT::where('device_name', 'Inverter ' . $inverterNumber)->get();
        $timestamps = $mqttRecords->pluck('timestamp')->map(function ($timestamp) {
            return Carbon::createFromTimestamp($timestamp)->timezone('Asia/Jakarta')->format('H:i');
        });

        
        // Assuming $inverterNumber is between 1 and 10
        $activePowers = MQTT::where('device_name', 'Inverter ' . $inverterNumber)->get();
        $adjustedPowers = $activePowers->pluck('ActivePower')->map(function ($power) {
            return (float) Str::before($power, '_kW');
        });

        // dd($adjustedPowers);

        return view('mqtt.index')->with(compact('timestamps', 'adjustedPowers'));
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
        // Retrieve the SQL query from the request payload
        $query = $request->input('query');

        try {
            // Execute the SQL query to insert data into the database
            DB::statement($query);

            // Return a success response
            return response()->json(['message' => 'Data inserted successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if insertion fails
            return response()->json(['message' => 'Failed to insert data', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MQTT $mQTT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MQTT $mQTT)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MQTT $mQTT)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MQTT $mQTT)
    {
        //
    }
}
