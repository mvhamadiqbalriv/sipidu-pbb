<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = User::all();
        $data['admin'] = User::where('level', 'Admin')->count();
        $data['user'] = User::where('level', 'User')->count();

        return view('pengguna.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = ([
            'name' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'username' => 'required|unique:users|max:20|min:6|alpha_dash',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'email' => 'required|unique:users',
            'level' => 'required'
        ]);

        if (empty($request->file('photo'))) {
            $validation['photo'] = 'mimes:jpeg,bmp,png,jpg|max:2048';
        };

        $request->validate($validation);

        if (!empty($request->file('photo'))) {
            $path = Storage::put('public/pengguna', $request->file('photo'));
        }

        $new = new User([
            'name' => $request->post('name'),
            'username' => $request->post('username'),
            'email' => $request->post('email'),
            'password' => bcrypt($request->post('password')),
            'level' => $request->post('level'),
            'photo' => $path
        ]);

        if ($new->save()) {
            return redirect('/pengguna')->with('success', 'Pengguna berhasil ditambahkan!');
        }else{
            return redirect('/pengguna')->with('error', 'Pengguna gagal ditambahkan!');
        }

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
        $data['detail'] = User::findOrFail($id);
        return view('pengguna.ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = ([
            'name' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'username' => 'required|max:20|min:6|alpha_dash|unique:users,username,'.$id,
            'email' => 'required|unique:users,email,'.$id,
        ]);
        if (empty($request->file('photo'))) {
            $validation['photo'] = 'mimes:jpeg,bmp,png,jpg|max:2048';
        };
        $request->validate($validation);

        $update = User::findOrFail($id);

        if (!empty($request->file('photo'))) {
            if (!empty($update->photo)) {
                Storage::delete($update->photo);
            }
            $path = Storage::put('public/pengguna', $request->file('photo'));
            $update->photo = $path;
        }

        $update->name = $request->post('name');
        $update->username = $request->post('username');
        $update->email = $request->post('email');
        $update->level = $request->post('level');

        if ($update->save()) {
            return redirect('/pengguna')->with('success', 'Pengguna berhasil diperbaharui!');
        }else{
            return redirect('/pengguna')->with('error', 'Pengguna gagal diperbaharui!');
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
        $delete = User::findOrFail($id);
        if (!empty($delete->photo)) {
            Storage::delete($delete->photo);
        }
        if ($delete->delete()) {
            return response()->json([
                'status' => 'Success',
                'data' => $delete,
            ], 200);
        }else{
            return response()->json([
                'status' => 'Error'
            ], 404);
        }
    }

    public function penggunaDelete(Request $request)
    {
        $delete = User::findOrFail($request->id);
        if (!empty($delete->photo)) {
            Storage::delete($delete->photo);
        }
        if ($delete->delete()) {
            return response()->json([
                'status' => 'Success',
                'data' => $delete,
            ], 200);
        }else{
            return response()->json([
                'status' => 'Error'
            ], 404);
        }
    }

    public function changePassword(Request $request, $id){

        $user = User::findOrFail($id);

        $request->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:new_password'
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect(route('pengguna.edit', $id))->with('error', 'Password lama anda salah!');
        }

        $user->password = Hash::make($request->new_password);

        if ($user->save()) {
            return redirect(route('pengguna.edit', $id))->with('success', 'Password berhasil diperbaharui!');
        }else{
            return redirect(route('pengguna.edit', $id))->with('error', 'Password gagal diperbaharui!');
        }

    }
}
