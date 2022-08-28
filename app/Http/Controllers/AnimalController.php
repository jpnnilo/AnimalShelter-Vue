<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalImage;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(){
        $animals = Animal::all();
        return response()->json(compact('animals'));
    }

    public function show($id){
        $animal = Animal::with(['adopter','rescuer'])->find($id);
        return response()->json(compact('animal'));
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

    public function destroy($id){
        Animal::find($id)->delete();
        $message = "Animal has been deleted";
        return response()->json(compact('message'));
    }

}
