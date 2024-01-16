<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\FamilyMember;
use App\Models\HeadMember;
use App\Models\State;
use Illuminate\Http\Request;
use App\Rules\AgeCheck;

class FamilyMemberController extends Controller
{

    public function HeadList(){

         $headMember = HeadMember::withCount('familyMembers')->get();
        return view('headlist',compact('headMember'));
    }
    public function index()
    {
        //$headMember = HeadMember::find(6); // Replace $id with the actual ID of the record

        // Access 'hobbies' as an array
        //$hobbies = $headMember->hobbies;
        // ["Nobis ullam dolore r","qq","ww","ee"]
        //$jsonHobbies = json_decode($hobbies);
        // return $jsonHobbies;
        // return $hobbies;
        $state = State::all();
        $city = City::all();
        return view('addMember',compact('state','city'));
    }

    public function uploadMemberPhoto(Request $request)
    {
        if ($request->hasFile('file')) {
            $avatarPath = $request->file('file');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path = $request->file('file')->move('upload/familyPhoto/', $avatarName);
            $img_path = 'upload/familyPhoto/' . $avatarName;
            return response()->json([
                'img_path' => $img_path,
                'img_name' => $avatarName,
            ]);
        }
    }
    public function store(Request $request)
    {
        //return $request;


        //$data['hobbies'] = json_encode($data['hobbies']);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'birthday' => ['required', 'date', new AgeCheck],
            'phone' => 'required|numeric|digits:10',
            'pincode' => 'required|numeric|digits:6',
            'state' => 'required',
            'city' => 'required',
            'marital_status' => 'required',
            'address' => 'required',
            'wedDate' => 'required_if:marital_status,m|nullable|date',
            'headPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hobbies.0' => 'required',


            // Add more validation rules for other fields as needed
        ]);

        //$hobbies = json_encode($validatedData['hobbies']);

        if ($request->hasFile('headPhoto')) {
            $avatarPath = $request->file('headPhoto');
            $avatarName = time() . '.' . $avatarPath->getClientOriginalExtension();
            $path = $request->file('headPhoto')->move('upload/familyPhoto/', $avatarName);
            $img_path = 'upload/familyPhoto/' . $avatarName;
        } else {
            $img_path = '';
        }

        $hobbies = [
            'hobbies' => json_encode($request->hobbies),
        ];

        //return $hobbies;

        // $HeadMember = HeadMember::create([
        //     'name' => $request->name,
        //     'surname' => $request->surname,
        //     'birthday' => $request->birthday,
        //     'mobile_no' => $request->phone,
        //     'pincode' => $request->pincode,
        //     'state' => $request->state,
        //     'city' => $request->city,
        //     'marital_status' => $request->marital_status,
        //     'wedding_date' => $request->wedDate,
        //     'photo' => $img_path,
        //     'address' => $request->address,
        //     'hobbies' => $hobbies,
        // ]);

        $HeadMember = new HeadMember();
        $HeadMember->name = $request->name;
        $HeadMember->surname = $request->surname;
        $HeadMember->birthday = $request->birthday;
        $HeadMember->mobile_no = $request->phone;
        $HeadMember->pincode = $request->pincode;
        $HeadMember->state = $request->state;
        $HeadMember->city = $request->city;
        $HeadMember->marital_status = $request->marital_status;
        $HeadMember->wedding_date = $request->wedDate;
        $HeadMember->photo = $img_path;
        $HeadMember->address = $request->address;
        $HeadMember->hobbies = json_encode($request->hobbies);
        $HeadMember->save();

        $LastId = $HeadMember->id;




        if ($request->MemName) {
            //return 1;
            for ($i = 0; $i < count($request->MemName); $i++) {

                $FamilyMember = new FamilyMember();
                $FamilyMember->hm_id = $LastId;
                //$FamilyMember->hm_id = 25;
                $FamilyMember->name = $request->MemName[$i];
                $FamilyMember->birthday = $request->Membirthday[$i];
                $FamilyMember->education = $request->MemEdu[$i];
                $FamilyMember->marital_status = $request->FamMaritalStatus[$i];
                $FamilyMember->wedding_date = $request->MemwedDate2[$i];
                $FamilyMember->photo = $request->hidMemPho[$i];
                $FamilyMember->save();
            }
        }

        return redirect()->route('HeadList');




    }

    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();

        return response()->json($cities);
    }
    public function ViewMember($id)
    {
        //return $id;
         $memberDetails = HeadMember::with('stateName','cityName','familyMembers')->where('id',$id)->first();
        //  $headMember = HeadMember::with('state')->find($id);
        //  return $headMember->state;
         //return $memberDetails->state;

        $subMember = $memberDetails->familyMembers;
        //return  $subMember;
        //d($subMember);
        $hobbies = json_decode($memberDetails->hobbies);
        return view('memberDetails',compact('memberDetails','hobbies','subMember'));
    }
}
