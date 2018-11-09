<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subslider;
class SubsliderController extends Controller
{
    public function createSubslider(){

    	return view('admin.subslider.createSubslider');
    }

    public function storeSubslider(Request $request){

    	$subslider = new Subslider();

    	$subsliderimage=$request->file('subsliderImage');
    	$subsliderName=$subsliderimage->getClientOriginalName();
    	$subsliderPath='public/subslider/';
    	$subsliderimage->move($subsliderPath,$subsliderName);
    	$subsliderUrl=$subsliderPath.$subsliderName;
        
        $subslider->subsliderImage = $subsliderUrl;
        $subslider->publicationStatus=$request->publicationStatus;
        $subslider->save();;

        return redirect('/sub-slider/add')->with('message','sub-slider info save successfully');

    	// echo "<pre>";
    	// print_r($subsliderName);
    	// exit();
    }

    public function manageSubslider(){

    	$subsliders = Subslider::paginate(2);

    	return view('admin.subslider.manageSubslider',compact('subsliders'));
    }


    public function editSubslider($id){

    	$subsliderById = Subslider::where('id', $id)->first();

    	return view('admin.subslider.editSubslider',compact('subsliderById'));
    }

    public function updateSubslider(Request $request){

    	$subsliderById = Subslider::find($request->subsliderId);
        // return $sliderById;
    	$subsliderimage = $request->file('subsliderImage');

    	if ($subsliderimage) {

    		unlink($subsliderById->subsliderImage);
    		$subsliderName = $subsliderimage->getclientOriginalName();
    		$subsliderPath = 'public/subslider/';
    		$subsliderimage->move($subsliderPath,$subsliderName);
    		$subsliderUrl = $subsliderPath.$subsliderName;
            $subsliderById->subsliderImage = $subsliderUrl;
            $subsliderById->publicationStatus = $request->publicationStatus;
            $subsliderById->save();

            return redirect('/sub-slider/manage')->with('message','Slider Info Update Successfull');
    	}else{
            
    		$subsliderUrl = $subsliderById->subsliderImage;
    		$subsliderById->subsliderImage = $subsliderUrl;
            $subsliderById->publicationStatus = $request->publicationStatus;
            $subsliderById->save();

            return redirect('/sub-slider/manage')->with('message','Slider Info Update Successfull');

    		// echo "<pre>";
    		// print_r($sliderUrl);
    		// exit();
    	}
    }
}
