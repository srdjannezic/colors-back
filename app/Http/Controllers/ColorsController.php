<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colors;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Colors::all();
        return response()->json(['colors' => $colors], 200);
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
        try {
            $request->validate([
                'name' => 'required|unique:colors',
                'hex' => 'required|unique:colors|regex:/^#[0-9a-fA-F]{6}$/',
            ]);

            $name = $request->name;
            $hex = $request->hex;

            $color = Colors::create(['name' => $name, 'hex' => $hex]);

            return response()->json([
                'status' => true,
                'color' => $color,
                'message' => 'Color Created Successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
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
        try {
            $request->validate([
                'name' => 'required',
                'hex' => 'required|regex:/^#[0-9a-fA-F]{6}$/',
            ]);

            $name = $request->name;
            $hex = $request->hex;

            $color = Colors::where('id', $id)->update(['name' => $name, 'hex' => $hex]);

            return response()->json([
                'status' => true,
                'color' => $color,
                'message' => 'Color Updated Successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Colors::where('id', $id)->delete();;

            return response()->json([
                'status' => true,
                'message' => 'Color Deleted Successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}