<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function createPerson(Request $request) {
        $person = new Person();
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->save();
        return response()->json([
            "msg"=>"user created successfully"
        ], 201);
    }

    public function getAllPersons() {
        $persons = Person::get()->toJson(JSON_PRETTY_PRINT);
        return response($persons, 200);
    }

    public function getPersonById($id) {
        if (Person::where('id', $id)->exists()) {
            $person = Person::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($person, 200);
        } else {
            return response()->json([
                "message" => "Person not found"
            ], 404);
        }
    }

    public function deletePersonById ($id) {
        if(Person::where('id', $id)->exists()) {
            $person = Person::find($id);
            $person->delete();

            return response()->json([
                "message" => "record deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "person not found"
            ], 404);
        }
    }

    public function updatePersonById(Request $request, $id) {
        if (Person::where('id', $id)->exists()) {
            $person = Person::find($id);

            $person->first_name = is_null($request->first_name) ? $person->first_name : $request->first_name;
            $person->last_name = is_null($request->last_name) ? $person->last_name : $request->last_name;
            $person->save();

            return response()->json([
                "message" => "record updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "person not found"
            ], 404);
        }
    }

}
