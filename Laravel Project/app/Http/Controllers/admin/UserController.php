<?php

namespace App\Http\Controllers\admin;

use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users', ['users' => $users]);

    }

    public function add()
    {
        return view('admin.pages.add_user');
    }

    public function addAction(UserRequest $request)
    {

        $data = [
            'uname' => $request->uname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'auth_type'=>$request->auth_type
        ];

        if($request->hasFile('image')){
            $image=$request->file('image');
            $name=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,null,function($constraints){$constraints->aspectRatio();})->crop(300,300)->save(public_path().'/uploads/users/'.$name);
            $data['image']=$name;
        }

        $result = User::create($data);

        if ($result) {
            return redirect()->route('users')->with('success', 'User created successfully');

        } else {
            return redirect()->route('add_user')->with('error', 'Could Not create users');

        }

    }

    public function deleteAction($id = null)
    {
        if (!isset($id))
            return redirect()->route('users')->with('error', 'There was a problem');
        $user = User::find($id);

        if ($user->delete()) {
            unlink(public_path() . '/uploads/users/' .$user->image);
            return redirect()->route('users')->with('success', 'User deleted successfully');
        } else {
            redirect()->route('users')->with('error', 'There was a problem');
        }

    }

    public function updateAction($id)
    {
        if (!isset($id))
            return redirect()->route('users')->with('error', 'There was a problem');

        $user = User::find($id);
        return view('admin.pages.update_user', ['user' => $user]);

    }

    public function update(UserRequest $request)
    {

        $user=User::find($request->id);
        $user->uname=$request->uname;
        $user->email=$request->email;
        $user->password=$request->password;
        
        if($request->hasFile('image')){
            if(unlink(public_path() . '/uploads/users/' .$user->image)) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(500, null, function ($constraints) {
                    $constraints->aspectRatio();
                })->crop(300, 300)->save(public_path() . '/uploads/users/' . $name);
                $user->image=$name;
            }
        }
        
        if($user->save()){
            return redirect()->route('users')->with('success','User updated successfully');
        }else{
            return redirect()->route('users')->with('error','User could not be updated successfully');
        }
    }

    public function changeUserStatus(Request $request)
    {
        try {

            $id= $request->id;
            if($request->action=='disable'){
                $data=[
                    'user_status'=>'disabled'

                ];

            }else if($request->action=='enable'){

                $data=[
                    'user_status'=>'enabled'
                ];
            }

            $update=User::where('id',$id)->update($data);
            if($update){
                return response()->json(['status' => 'success','type'=>$request->action]);
            }


        }catch (\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
