<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function settings(){
        $user=Auth::user();
        return view("user.settings", compact("user"));
    }
    public function useraudit(Request $request){
        if($request->has('cancel')){
            $this->delete($request);
        }
        elseif ($request->has('update')){
            switch ($this->update($request)){
                case 1: return redirect()->route('usersettings')->with('success', 'Dein Benutzername wurde aktualisiert'); break;
                case 2: return redirect()->route('home')->with('success', 'Eine neue bestätigungs E-Mail wurde versandt. <br> Sollte dies ein fehler gewesen sein, kontakiere bitte den systemadministrator');
            }
        }
    }
    private function delete(Request $request){
        dd("delete".Auth::user()->id);
    }
    private function update(Request $request){
        if ($request->email!=Auth::user()->email){
            $token=Str::uuid()->toString();
            Users::where('id', Auth::user()->id)->update(['email'=>$request->email, 'verified'=>0, 'email_verified_at'=>null]);
            RegisterController::resendValidation(Auth::user()->id, $token);
            Auth::logout();
            return 2;
        }elseif($request->uname!=Auth::user()->uname){
            Users::where('id', Auth::user()->id)->update(['uname'=>$request->uname]);
            return 1;
        }
        //dd("update");
    }
}
