<?php

namespace App\Http\Controllers;

use App\Models\Supermarket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupermarketController extends Controller
{
    //
    public function add(Request $request)
    {
        $supermarket = new Supermarket([
            'name' => $request->get('name'),
            'location' => $request->get('location')
        ]);

        $supermarket->save();

        return response()->json("success");
    }

    public function list()
    {
        $supermarkets = DB::table('supermarkets')
        ->orderBy('name', 'desc')
        ->get();

        $data['supermarkets'] = $supermarkets;

        return response()->json($data);
    }

    public function view(Request $request,string $id)
    {
        $supermarketId = (int)$id;
        return response()->json(Supermarket::find($supermarketId));
    }

    public function delete(Request $request,string $id)
    {
        $supermarketId = (int)$id;
        Supermarket::where('id', $supermarketId)->delete();
        return response()->json('Success');
    }

    public function update(Request $request,string $id)
    {
        $supermarketId = (int)$id;
        $supermarket =  Supermarket::find($supermarketId);
        $supermarket->name =$request->get('name');
        $supermarket->location = $request->get('location');
        $supermarket->save();
        
        return response()->json('Success');
    }
}
