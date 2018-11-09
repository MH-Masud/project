<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;

class ManufactureController extends Controller
{
    public function createManufacture(){

    	return view('admin.manufacture.createManufacture');
    }

    public function manageManufacture(){
        
        $manufactureinfo = Manufacture::all();
    	return view('admin.manufacture.manageManufacture',compact('manufactureinfo'));
    }

    public function storeManufacture(Request $request){

        $manufacture = new Manufacture();
        $manufacture->manufactureName = $request->manufactureName;
        $manufacture->manufactureDescription = $request->manufactureDescription;
        $manufacture->manufactureStatus = $request->manufactureStatus;
        $manufacture->save();
        return redirect('/manufacture/add')->with('message','Manufacture Info Save Successfully');
    }

    public function editManufacture($id){

    	$manufacture = Manufacture::find($id);
    	return view('admin.manufacture.editManufacture',compact('manufacture'));
    }

    public function updateManufacture(Request $request){
        
        // dd($request->all());
        $manufacture = Manufacture::find($request->id);
        $manufacture->manufactureName = $request->manufactureName;
        $manufacture->manufactureDescription = $request->manufactureDescription;
        $manufacture->manufactureStatus = $request->manufactureStatus;
        $manufacture->save();
        return redirect('/manufacture/manage')->with('message','Manufacture Info Update Successfully');

    }

    public function deleteManufacture($id){

    	$manufacture = Manufacture::find($id);
    	$manufacture->delete();
    	return redirect('/manufacture/manage')->with('message','Manufacture Info Delete Successfull');
    }
}
