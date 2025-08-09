<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use \App\Models\MindMap;


class MindMapController extends Controller
{
    public function index()
    {
        try {
            $data = MindMap::all();
        } catch (\Exception $e) {
            return Inertia::render('MindMap/Index', [
                "title" => "Mind Map",
                "data" => [],
                "error" => $e->getMessage(),
            ]);
        }

        return Inertia::render('MindMap/Index', [
            "title" => "Mind Map",
            "data" => $data->toArray(),
        ]);
    }

    public function create()
    {
        return Inertia::render('MindMap/Create', [
            "title" => "Mind Map | Create",
        ]);
    }

    public function show(MindMap $mindMap)
    {
        return Inertia::render('MindMap/Show', [
            "title" => "Mind Map | SHow",
            "data" => $mindMap,
        ]);
    }

    public function store() {}

    public function update(Request $request, $id) {
        try{
            $data = MindMap::findOrFail($id);
            $data->nodes = $request->nodes;
            $data->save();

            return back()->with('success', 'Mind map updated successfully');

        }catch(\Exception $e){
            return back()->with('error', 'Mind map update failed');
        }
    }

    public function edit() {}
    public function delete() {}
}
