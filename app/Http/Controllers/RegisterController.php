<?php

namespace App\Http\Controllers;

use App\Mail\MailingController;
use App\Models\Users;
use App\Models\VerifyUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    //registration functions
    public function postRegister(Request $request){
        if (auth()->user()){
            auth()->logout();
        }
        $this->validateForm($request);
        $user=Users::create($request->all());
        //$token=sha1(time());
        $token=Str::uuid()->toString();
        $verify=VerifyUsers::create([
                'user_id'=>$user->id,
                'token'=>$token,]
        );
        $this->sendValidation($user->id, $token);
        return redirect()->route('home')->with('success', 'Vielen dank für deine Registrierung! <br> Bitte bestätige deine E-Mail Adresse mit dem Link den du an deine Mail gesendet bekommen hast :)');
    }
    private function validateForm(Request $request){
        $this->validate($request, [
                'email'=>'required|email|unique:users',
                'password'=>'required|confirmed',
                'uname'=>'required|max:50',
        ]);
    }
    public function sendValidation($userid, $token){
        $user=Users::findOrFail($userid);
        Mail::to($user->email)->send(new MailingController($user, $token));
    }
    public static function resendValidation($userid, $token){
        $verify=VerifyUsers::create([
                'user_id'=>$userid,
                'token'=>$token,]
        );
        $user=Users::findOrFail($userid);
        Mail::to($user->email)->send(new MailingController($user, $token));
    }
    //e-mail verification functions
    public function verify($token){
        if($user_id=VerifyUsers::firstWhere('token', $token)===null){
            return redirect(route('home'))->with('error', "Ein Fataler Fehler ist aufgetreten. Bitte kontaktieren Sie den Admin.");
        }else $user_id=VerifyUsers::firstWhere('token', $token)->user_id;

        Users::firstWhere('id', $user_id)->update(['email_verified_at'=>Carbon::now()]);
        return redirect(route('home'))->with('success', "Die E-Mail wurde verifiziert. Bitte Loggen Sie sich ein.");
    }
    //Login Functions
    public function login(){
        return view('login');
    }
    public function postlogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials=$request->only(['email', 'password']);
        if(auth()->attempt($credentials)){
            if(auth()->user()->email_verified_at!=null&&auth()->user()->verified==0){
                auth()->user()->update(["verified"=> 1]);
                return redirect()->route('home')->with('success', "Du hast dich erfolgreich Eingeloggt und deine E-Mail Adresse wurde verifiziert :)<br>Viel spaß!");
            }
            return redirect()->route('home')->with('success', "Du hast dich erfolgreich Eingeloggt :)");
        }return redirect()->route('login')->with('error', 'Diese Logindaten sind uns leider nicht bekannt <br> sollte dieser Fehler öfter auftreten, so setze dich bitte mit uns unter <a href="mailto:support@hology.events">support@hology.events</a> in verbindung');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('home')->with('success', 'Du wurdest erfolgreich ausgeloggt :) <br> bis später!');
    }
}
