<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    //
    public function store(SupplierRequest $request)
    {
        $supplier = new Supplier([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'location' => $request->get('location'),
            'supermarket' => $request->get('supermarket')
        ]);

        $supplier->save();

        return response()->json("success");
    }

    public function list()
    {
        $suppliers = DB::table('suppliers')
        ->orderBy('name', 'desc')
        ->get();

        $data['suppliers'] = $suppliers;

        return response()->json($data);
    }

    public function view(Request $request,string $id)
    {
        $supplierId = (int)$id;
        $supplier = Supplier::find($supplierId);
        if ($supplier) {
            return response()->json($supplier);
        } else {
            return response()->json("Record not found");
        }
    }

    public function delete(Request $request,string $id)
    {
        $supplierId = (int)$id;
        Supplier::where('id', $supplierId)->delete();
        return response()->json('Success');
    }

    public function update(Request $request,string $id)
    {
        $supplierId = (int)$id;
        $supplier =  Supplier::find($supplierId);
        if ($supplier != null) {
            $supplier->name =$request->get('name');
            $supplier->phone = $request->get('phone');
            $supplier->location = $request->get('location');
            $supplier->supermarket_id = $request->get('supermarket_id');
            $supplier->save();

            $message = "Success";
        } else {
            $message = "Record not found!";
        }
        return response()->json($message);
    }
}
