<?php

namespace App\Http\Controllers;

use App\Http\Requests\BulkUploadRequest;
use App\Http\Requests\ManagerRequest;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    /**
     * 
     * 
     */
    public function store(ManagerRequest $request)
    {
        $manager = new Manager([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'supermarket_id' => $request->get('supermarket_id')
        ]);

        $manager->save();

        return response()->json("success");
    }

    /**
     * Bulk upload CSV employees and assign to managers
     */
    public function bulk(BulkUploadRequest $request,string $managerId)
    {
        $csvPath = $request->file('file');
        $users = array_map('str_getcsv', file($csvPath));
        //implement db insertion
        return response()->json(count($users));
    }
    
    public function list()
    {
        $managers = DB::table('managers')
        ->orderBy('name', 'desc')
        ->get();

        $data['managers'] = $managers;

        return response()->json($data);
    }
    
    public function view(Request $request,string $id)
    {
        $managerId = (int)$id;
        $manager = Manager::find($managerId);
        if ($manager) {
            return response()->json($manager);
        } else {
            return response()->json("Record not found");
        }
    }
    
    public function delete(Request $request,string $id)
    {
        $managerId = (int)$id;
        Manager::where('id', $managerId)->delete();
        return response()->json('Success');
    }

    public function update(Request $request,string $id)
    {
        $managerId = (int)$id;
        $manager =  Manager::find($managerId);
        if ($manager != null) {
            $manager->name =$request->get('name');
            $manager->phone = $request->get('phone');
            $manager->email = $request->get('email');
            $manager->supermarket_id = $request->get('supermarket_id');
            $manager->save();

            $message = "Success";
        } else {
            $message = "Record not found!";
        }
        return response()->json($message);
    }
}
