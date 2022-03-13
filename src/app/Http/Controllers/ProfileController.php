<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $profile = $request->id ? User::find($request->id) : Auth::user();

        if(!$profile) {
            $request->session()->flash('error', 'Usuário informado não existe!');

            return redirect()->back();
        }

        return view("profile", [
            "profile" => $profile,
            "userId" => $request->id ? $request->id : Auth::user()->id,
        ]);
    }

    public function profileUpdate(ProfileRequest $request)
    {
        $user = User::find($request->input('id'));

        if(!$user) {
            $request->session()->flash('error', 'Usuário informado não existe!');

            return redirect()->back();
        }

        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        $user->password = $request->input('senha');
        $user->isAdmin = $request->input('isAdmin') == true ? 1 : 0;

        $user->save();

        $request->session()->flash('success', 'Usuário atualizado com sucesso!');

        return redirect()->route('dashboard');
    }
}
