<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
class SliderController extends Controller
{
    public function createSlider(){

    	return view('admin.slider.createSlider');
    }

    public function storeSlider(Request $request){

    	$this->validate($request,[
            
            'sliderImage'=>'required',
    	]);
        
        $slider = new Slider();

    	$sliderimage=$request->file('sliderImage');
    	$sliderName=$sliderimage->getclientOriginalName();
    	$sliderPath='public/slider/';
    	$sliderimage->move($sliderPath,$sliderName);
    	$sliderUrl=($sliderPath.$sliderName);


        $slider->sliderImage = $sliderUrl;
        $slider->publicationStatus= $request->publicationStatus;
        $slider->save();

        return redirect('/slider/manage')->with('message','Slider Image Upload Successfull');

    	// echo "<pre>";
    	// print_r($sliderUrl);
    	// exit();
    	// $slider->publicationStatus = $request->publicationStatus;
    	// $slider->save();

    	// return redirect('/slider/add')->with('message','Slider Image Upload Successfull');
    }

    public function manageSlider(){
        $sliders = Slider::paginate(2);
        // return $slider
    	return view('admin.slider.manageSlider',compact('sliders'));
    }

    public function editSlider($id){

    	$sliderById = Slider::where('id', $id)->first();
    	return view('admin.slider.editSlider',compact('sliderById'));
    }

    public function updateSlider(Request $request){

    	$sliderById = Slider::find($request->sliderId);
        // return $sliderById;
    	$sliderimage = $request->file('sliderImage');

    	if ($sliderimage) {

    		unlink($sliderById->sliderImage);
    		$sliderName = $sliderimage->getclientOriginalName();
    		$sliderPath = 'public/slider/';
    		$sliderimage->move($sliderPath,$sliderName);
    		$sliderUrl = $sliderPath.$sliderName;
            $sliderById->sliderImage = $sliderUrl;
            $sliderById->publicationStatus = $request->publicationStatus;
            $sliderById->save();

            return redirect('/slider/manage')->with('message','Slider Info Update Successfull');
    	}else{
            
    		$sliderUrl = $sliderById->sliderImage;
    		$sliderById->sliderImage = $sliderUrl;
            $sliderById->publicationStatus = $request->publicationStatus;
            $sliderById->save();

            return redirect('/slider/manage')->with('message','Slider Info Update Successfull');

    		// echo "<pre>";
    		// print_r($sliderUrl);
    		// exit();
    	}
    }

    public function deleteSlider($id){

    	$sliderById = Slider::where('id', $id)->first();
         unlink($sliderById->sliderImage);
        $sliderById->delete();
       

    	return redirect('/slider/manage')->with('message','Slider Delete Successfull');
    }
}
