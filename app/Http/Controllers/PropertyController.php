<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PropertyOwnerModel;
use App\Models\AminitiesModel;
use App\Models\PropertyAminitiesModel;
use App\Models\PropertyModel;
use Validator;

class PropertyController extends Controller
{
    //
    public function index() {
        $data["get_owner"] = PropertyOwnerModel::get();
        $data["aminities"] = AminitiesModel::get();
        return view('property/property_add', compact("data"));
    }
    public function addProperty() {
        $data["get_owner"] = PropertyOwnerModel::get();
        $data["aminities"] = AminitiesModel::get();
        return view('property/property_add', compact("data"));
    }
    public function storeProperty(Request $request) {
        $validated = $request->validate([
            "name" => 'required',
            "description" => 'required',
            "type" => 'required',
            "size" => 'required',
            "property_owner_id" => 'required|numeric',
            "property_aminities" => 'required',
            "address" => 'required',
            "brochure" => 'required',
            "photos" => 'required'
        ]);
        
        $propertyArr = [
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "type" => $request->input("type"),
            "size" => $request->input("size"),
            "property_owner_id" => $request->input("property_owner_id"),
            "address" => $request->input("address"),
            
            "photos" => $request->input("photos")
        ];
        $property_aminities = $request->input("property_aminities");
        if ($property_aminities && !empty($property_aminities)) {
            $propertyArr["property_aminities"] = implode(', ', $property_aminities);
        }
        
        if($request->file('brochure')){
            $file= $request->file('brochure');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/images'), $filename);
            $propertyArr["brochure"] = $filename;
        }
        $photos = [];
        if($request->file('photos')){
            foreach ($request->file('photos') as $key => $photo) {
                $file = $photo;
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/images'), $filename);
                $photos[] = $filename;  
            }
        }

        if (!empty($photos)) {
            $propertyArr["photos"] = implode(',', $photos);
        }

        $propertyId = PropertyModel::create($propertyArr)->id;
        
        if ($property_aminities && !empty($property_aminities)) {
            foreach ($property_aminities as $key => $aminity) {
                // $property = PropertyAminitiesModel::create([
                //     "property_id" => $propertyId,
                //     "aminities_id" => $aminity
                // ]);
            }
        }
        
        return redirect()->route('property_list')->withSuccess(__('User created successfully.'));
    }
}
