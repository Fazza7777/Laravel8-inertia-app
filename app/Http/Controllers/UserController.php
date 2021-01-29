<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{

    public function index()
    {
        //##################################
        // $users = User::when(request()->get('search') ?? '',function($query,$search){
        //     $query->where('name','like',"%{$search}%")
        //           ->orWhere('email','like',"%{$search}%");
        // })->orderBy('id','desc')->paginate(15);
        //#####################################
        //Eloquent localscope use method
        $users = User::filter(request()->only('search',''))
                ->orderBy('id','desc')->paginate(15);;
        return Inertia::render('User/Index',[
           'users'=>$users,
           "search"=>request()->get('search','')
        ]);
    }

    public function create()
    {
       return Inertia::render('User/Create',[
           'user'=>new User()
       ]);
    }

    public function store(UserStoreRequest $request)
    {

       User::create($request->only('name','email','password'));
       return redirect()->route('user.index')->with('success','User create successfully!');
    }


    public function edit(User $user)
    {
        return Inertia::render('User/Edit',compact('user'));
    }


    public function update(UserUpdateRequest $request,User $user)
    {

        $user->update($request->only('name','email'));
        if($request->filled('password')){
            $user->update($request->only('password'));
        }
        return redirect()->route('user.index')->with('success','User update successfully');
    }


    public function destroy(User$user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','User delete successfully!');
    }
}
