<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Owner;
class CarController extends Controller
{
    public function index(Request $request){
        $filter=$request->session()->get('filterCar',(object)['reg_number'=>null,'brand'=>null,'model'=>null]);
        $data = Car::filter($filter)->get();

        return view('car-list',['data'=>$data,'filter'=>$filter,'cars'=>Car::all()]);
    }
    public function addCar(){
        return view('add-car', ['owners'=>Owner::all()]);
    }
    public function saveCar(Request $request){
        $request->validate([
            'reg_number'=> 'required|min:6|max:6',
            'brand'=>'required|min:2|max:20',
            'model'=>'required|min:2|max:20'
        ]);

        $reg_number = $request->reg_number;
        $brand = $request->brand;
        $model = $request->model;
        $owner_id = $request->owner_id;

        $own = new Car();
        $own -> reg_number = $reg_number;
        $own -> brand = $brand;
        $own -> model = $model;
        $own -> owner_id = $owner_id;
        $own ->save();

        return redirect()->back()->with('success','Car Added Successfully');
    }
    public function editCar($id){
        $data = Car::where('id','=',$id)->first();
        return view('edit-car',compact('data'), ['owners'=>Owner::all()]);
    }
    public function updateCar(Request $request){
        $request->validate([
            'reg_number'=> 'required|min:6|max:6',
            'brand'=>'required|min:2|max:20',
            'model'=>'required|min:2|max:20'
        ]);
        $id = $request->id;    
        $reg_number = $request->reg_number;
        $brand = $request->brand;
        $model = $request->model;
        $owner_id = $request->owner_id;
    
        Car::where('id','=',$id)->update([
            'reg_number'=>$reg_number,
            'brand'=>$brand,
            'model'=>$model,
            'owner_id'=>$owner_id
        ]);
        return redirect()->back()->with('success','Car Updated Successfully');
    }
    public function deleteCar($id){
        Car::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Car Deleted Successfully');

    }
    public function search(Request $request){
        $filterCar=new \stdClass();
        $filterCar->reg_number=$request->reg_number;
        $filterCar->brand=$request->brand;
        $filterCar->model=$request->model;
     
        $request->session()->put('filterCar',$filterCar);
        return redirect()->back()->with('success','Search Was Successful');
    }
}
