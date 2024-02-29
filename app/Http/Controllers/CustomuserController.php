<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customuser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CustomuserController extends Controller
{
    public function adduser(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:200',
        //     'email' => 'required|email',
        //     'city' => 'required',
        //     'password' => 'required|min:8',
        //     'confirmpassword' => 'required|same:password',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }

        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email',
            'city' => 'required',
            'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $save = new Customuser();
        $save->create($data);

        return response('success', 200);
    }

    public function getusers()
    {
        $users = Customuser::all();
        return response()->json($users, 200);
    }

    public function getuserdata($id)
    {
        $user = Customuser::find($id);
        if ($user) {
            return response()->json($user, 200);
        }
        $data = array();
        $data['message'] = 'No user found';
        return response()->json($data, 400);
    }

    public function updateuser(Request $request, $id)
    {
        $data = $request->all();

        $validation =  ['name' => 'required|max:200',
        'email' => 'required|email',
        'city' => 'required'];
        if (isset($data['password'])) {
            $validation = ['confirmpassword' => 'required|same:password|min:8'] + $validation;
        }
        $request->validate($validation);

        $data['password'] = Hash::make($data['password']);
        $user = Customuser::find($id);
        if ($user) {
            $user->update($data);
        }
        return response('success', 200);
    }

    public function deleteuser($id){
        $user = Customuser::find($id);
        if ($user) {
            $user->delete();
        }
        return response('success', 200);
    }
}
