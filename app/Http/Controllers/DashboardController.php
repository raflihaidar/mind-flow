<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use \App\Models\MindMap;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $data = MindMap::all();
        } catch (\Exception $e) {
            return Inertia::render('Dashboard/Index', [
                "title" => "Dashboard",
                "data" => [],
                "error" => $e->getMessage(),
            ]);
        }

        return Inertia::render('Dashboard/Index', [
            "title" => "Dashboard",
            "data" => $data->toArray(),
        ]);
    }
}
