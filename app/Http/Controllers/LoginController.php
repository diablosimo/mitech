<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials,$request->input('remember'))) {
            if((Admin::where('user_id', Auth::user()->id)->first()!=null)){
                if (Auth::user()->approuve==1){
                    return redirect()->to('/admin');
                }else{
                    Auth::logout();
                    return redirect('login');
                }
            } else{
                if (Auth::user()->approuve==1){
                    return redirect()->to('home');
                }else {
                    session()->flash('failed', 'votre demande d\'adhesion/partenariat est en cours de traitement');
                    Auth::logout();
                    return redirect('login');
                }
            }
        }else{
            session()->flash('failed', 'echec d\'authentification');
            return redirect('login');
        }
    }

    public function resetPassword(Request $request){
        dd($request);
        return redirect('login');
    }

    public function editPassword(Request $request){
        $validatedData=$request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6|different:old_password',
        ]);
        $user=User::find(Auth::user()->id);
        if($user){
           if(Hash::check($request->input('old_password'),$user->password)){
               $user->password = Hash::make($request->password);
               $user->save();
               session()->flash('success', 'votre mot de passe a été modifié.');
           }else{
               session()->flash('failed', 'votre mot de passe n\'a pas été modifié.');
           }
        }
        if(Admin::where('user_id', auth()->user()->id)->first()!=null) return redirect('admin/compte');
        return redirect('/compte');
    }

}
