<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Disease;
use App\Models\AnimalImage;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(){
        $animals = Animal::all();
        return response()->json(compact('animals'));
    }

    public function show($id){
        $animal = Animal::with(['adopter','rescuer','diseases'])->find($id);
        foreach ($animal->diseases as $diseases) {
            $disease_array[] = $diseases->pivot->disease_id;
            //get all diseases id from pivot table the pass it to array
       }
           
       //this is to populate dropdown and check if the animal already has that disease
       if(empty($disease_array)){
           $disease = Disease::all();
             
       }else{
           $disease = Disease::whereNotIn('id', $disease_array)->get();
           //select all diseases id where not in id of array $disease_array
       }

       //check if someone is login
       // $auth = (isset(auth()->user()->name) ? auth()->user()->name : '');

       return response()->json(compact('animal','disease'));

    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'age' => ['required','numeric'],
            'gender' => 'required',
            'breed' => 'required',
            'type' => 'required',
        ]);
        
        $animal = new Animal();
        $animal->name = $request->name;
        $animal->age = $request->age;
        $animal->gender = $request->gender;
        $animal->breed = $request->breed;
        $animal->type = $request->type;
        $animal->save();
        return response()->json(compact('animal'));

        // for image upload 
        // $animal_id = $animal->id;
        // if($request->hasFile('images')){
        //     foreach($request->file('images') as $image){
        //         $animalImages = new AnimalImage(); 
        //         $animalImages->animal_id = $animal_id;
        //         $animalImages->image = $image->store('images','public');
        //         $animalImages->save();
        //     }
        // }
    }

    public function addDisease(Request $request, $id){

        $validate = $request->validate([
            'disease'=>'required'
        ]);
        
        $animal = Animal::find($id);
        $animal->diseases()->attach($request->disease);
        $disease = $animal->diseases()->where('disease_id', $request->disease)->first(); //get the animal latest added disease
        $message = "Disease has been added";
        return response()->json(compact('message','disease'));
    }

    

    public function update(Request $request, $id){

        $validate = $request->validate([
            'name' => 'required',
            'age' => ['required','numeric'],
            'gender' => 'required',
            'breed' => 'required',
            'type' => 'required'    
        ]);
        
        $animal = Animal::find($request->id);
        $animal->name = $request->name;
        $animal->age = $request->age;
        $animal->gender = $request->gender;
        $animal->breed = $request->breed;
        $animal->type = $request->type;
        $animal->save();
        
        return response()->json(compact('animal'));
    }


    public function removeDisease(Request $request, $id){
        $animal = Animal::find($id);
        $animal->diseases()->detach($request->disease_id);
    
        $message = "Disease has been removed!";
        return response()->json(compact('message'));
    }


    public function destroy($id){
        Animal::find($id)->delete();
        $message = "Animal has been deleted";
        return response()-> json(compact('message'));
    }   


}
