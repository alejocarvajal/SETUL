<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class adminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        $title = 'Listado de usuarios';

        return view('admin.index', compact('title', 'usuarios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'nombre' =>'required',
            'email'=>['required','email','unique:users,email'],
            'clave' =>'required'
        ],
            [
                'nombre.required' => 'El campo nombre es obligatorio'
            ]);
        User::create([
            'nombre'=>$data['nombre'],
            'email' =>$data['email'],
            'clave' => bcrypt($data['clave'])
        ]);
        return redirect()->action('AdminController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'nombre' =>'required',
            'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
            'clave' =>''
        ],
            [
                'nombre.required' => 'El campo nombre es obligatorio'
            ]);
        if($data['clave'] != null){
            $data['clave'] = bcrypt($data['clave']);
        }else{
            unset($data['clave']);
        }
        $user->update($data);

        return redirect()->action('AdminController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->action('AdminController@index');
    }
}
