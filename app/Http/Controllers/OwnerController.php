<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Car;

class OwnerController extends Controller
{
    public function index(Request $request){
        $filter=$request->session()->get('filterOwner',(object)['name'=>null,'surname'=>null,'years'=>null]);
        $data = Owner::filter($filter)->get();
       
        return view('owner-list',['data'=>$data,'filter'=>$filter, 'owners'=>Owner::all()]);
    }
    public function addOwner(){
        return view('add-owner');
    }
    public function saveOwner(Request $request){
        $request->validate([
            'name'=> 'required|min:2|max:20',
            'surname'=>'required|min:2|max:20',
            'years'=>'required|integer'
        ]);

        $name = $request->name;
        $surname = $request->surname;
        $years = $request->years;

        $own = new Owner();
        $own -> name = $name;
        $own -> surname = $surname;
        $own -> years = $years;
        $own ->save();

        return redirect()->back()->with('success','Owner Added Successfully');
    }
    public function editOwner($id){
        $data = Owner::where('id','=',$id)->first();
        return view('edit-owner',compact('data'));
    }
    public function updateOwner(Request $request){
        $request->validate([
            'name'=> 'required|min:2|max:20',
            'surname'=>'required|min:2|max:20',
            'years'=>'required|integer'
        ]);
        $id = $request->id;    
        $name = $request->name;
        $surname = $request->surname;
        $years = $request->years;
    
        Owner::where('id','=',$id)->update([
            'name'=>$name,
            'surname'=>$surname,
            'years'=>$years
        ]);
        return redirect()->back()->with('success','Owner Updated Successfully');
    }
    public function deleteOwner($id){
        Owner::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Owner Deleted Successfully');

    }
    public function search(Request $request){
        $filterOwner=new \stdClass();
        $filterOwner->name=$request->name;
        $filterOwner->surname=$request->surname;
        $filterOwner->years=$request->years;
     
        $request->session()->put('filterOwner',$filterOwner);
        return redirect()->back()->with('success','Search Was Successful');
    }
}
