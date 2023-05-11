<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerAPIController extends Controller
{
    public function index()
    {
        return Owner::all();
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $owner=new Owner();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->years=$request->years;
        $owner->save();

        return $owner;
    }
    public function show($id)
    {
        return Owner::find($id);
    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {
        $owner=Owner::find($id);
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->years=$request->years;
        $owner->save();

        return $owner;
    }
    public function destroy($id)
    {
        Owner::destroy($id);
        return true;
    }
}
