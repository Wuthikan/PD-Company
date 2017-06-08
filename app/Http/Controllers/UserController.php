<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Http\Requests\UserRequest;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::get();
       return view('auth.Userhome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      $this->validate($request,[
        'name' => 'required|string|max:255',
        'class' => 'required|Integer|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
          ]);
        $user =  User::create([
              'name' => $request['name'],
              'email' => $request['email'],
              'class' => $request['class'],
              'password' => bcrypt($request['password']),
              'position' => $request['position'],
              'tel' => $request['tel'],
              'address' => $request['address'],
          ]);
          Alert::success('เพิ่มผู้ใช้ระบบสำเร็จ!');
          return redirect('Usermanagement');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    public function editUser($id)
    {
          $user = User::find($id);

          return view('auth.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
      $user = User::findOrFail($id);
        $user->update($request->all());
        Alert::success('แก้ไขข้อมูลผู้ใช้!');
        if(Auth::user()->class == 1) {
        return redirect('home');
      }elseif(Auth::user()->class == 4){
        return redirect('Usermanagement');
      }
      elseif(Auth::user()->class == 2) {
          return redirect('Inventory');
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      Alert::success('เราได้ลบผู้ใช้แล้ว!');
      return redirect('Usermanagement');
    }
}
