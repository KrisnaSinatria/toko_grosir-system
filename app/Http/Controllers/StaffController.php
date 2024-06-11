<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.staff.index',[
            'staffs' => Staff::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.staff.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users,email|email',
            'username' => 'required',
            'password' => 'required',
            'phone' => 'required|unique:staff,phone',
            'address' => 'required',
        ]);
        
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), 
            'role' => 'staff', 
        ]);
        $staff = Staff::create([
            'user_id' => $user->id, 
            'username' =>$validatedData['username'], 
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);
        return redirect('dashboard/staff')->with('createStaff', 'Pembuatan staff berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('dashboard.staff.edit',[
            'staff' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'phone' => 'required|unique:staff,phone,' . $staff->id,
            'address' => 'required',
        ]);
    
        $validatedUser = $request->validate([
            'password' => 'nullable',
        ]);
        Staff::where('id', $staff->id)->update($validatedData);

        $user = User::where('id', $staff->user_id)->first(); 
        if ($user) {
            $user->password = Hash::make($validatedUser['password']); 
            $user->save();
        }
        
        
        return redirect('dashboard/staff')->with('updateStaffSuccess', 'Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
