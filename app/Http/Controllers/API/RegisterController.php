<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['register'=>Register::all()],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $errMsg = [
            'required' => 'The :attribute field is required',
        ];
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'status' => 'required',
        ],$errMsg );
        if($validator->fails()){
            return response()->json(['msg'=>$validator->errors()],200);
        }else{
            $register = Register::create([
                'name'=> $request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'role'=>$request->role,
                'status'=>$request->status
            ]);
            return response()->json(['register'=>$register,'msg'=>'Registeration successfully'],200);
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['register'=>Register::find($id)],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $register = Register::findOrFail($id);
            $register->update([
                'name'=> $request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'role'=>$request->role,
                'status'=>$request->status
            ]);
            return response()->json(['updatedData'=>$register,'msg'=>'User updated successful'],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $register = Register::findOrFail($id);
        $register->delete();
        return response()->json(['deletedData'=>$register,'msg'=>'User deleted successful'],200);
    }
}
