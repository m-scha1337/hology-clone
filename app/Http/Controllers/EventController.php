<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventController extends Controller
{
    public function index(){
        return view('event.create');
    }
    public function postcreate(Request $request){
        $this->validate($request, [
            'eventname'=>'required|max:150',
            'invitegreet'=>'max:1000',
            'eventdesc'=>'max:5000',
            'locationHuman'=>'required|max:500',
            'date'=>'required|date',
        ]);
        $bgcolours=[
            '#E0BBE4','#957DAD','#D291BC','#FEC8D8','#FFDFD3','#A5C8E4','#C0ECCC','#F9F0C1','#F4CDA6','#F6A8A6',
        ];
        $allowed="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $invitecode=substr(str_shuffle($allowed), 0, 3)."-".substr(str_shuffle($allowed), 0, 3)."-".substr(str_shuffle($allowed), 0, 3);
        $invitecodeRequest=new Request(['invitecode'=>$invitecode]);
        $validator=Validator::make($invitecodeRequest->all(), ['invitecode'=>'unique:events,invitecode']); //for the extremely unlikely event that an event code already exists.
        if($validator->fails()){
            $invitecode=substr(str_shuffle($allowed), 0, 3)."-".substr(str_shuffle($allowed), 0, 3)."-".substr(str_shuffle($allowed), 0, 3);
        }
        $request->merge(['eventname'=>ucfirst($request->eventname)]);
        $event=new Events();
        $event->fill($request->all());
        $event->user_fs=auth()->id();
        $event->invitecode=$invitecode;
        $event->expires=Carbon::now()->addMonths(4);
        $event->bgcolour=$bgcolours[array_rand($bgcolours)];
        $event->uuid=Str::uuid()->toString();
        if($request->exists('submit')){
            $event->public=false;
            $event->status="created";
            $event->save();
            return redirect()->route("home")->with('success', "Dein Event wurde erfolgreich erstellt und ist nun über deinen Nutzeraccount erreichbar");
            //return view("event.crsuccess", compact('event'));
        }
        elseif ($request->exists('submitpublic')){
            $event->public=true;
            $event->status="published";
            $event->save();
            return redirect()->route("eventshow", $event->invitecode)->with('success', 'Dein Event wurde erfolgreich gespeichert und veröffentlicht!');
        }
    }
    public function show($uuid){
        if(Events::where('uuid', $uuid)->get()->count()>0){
            $event=Events::firstWhere('uuid', $uuid);
            return view("event.show", compact("event"));
        }
        elseif(Events::firstWhere("uuid", $uuid)->user_fs==Auth::user()->id){
            $event=Events::firstWhere('uuid', $uuid);
            return view("event.show", compact("event"));
        }
        elseif(Events::firstWhere("uuid", $uuid)->public==0&&(Events::firstWhere("uuid", $uuid)->user_fs!==Auth::user()->id)){
            return redirect()->route('home')->with('error', "Dieses Event gehört dir nicht und ist auf privat gestellt");
        }
        return redirect()->route('home')->with('error', "Diese bezeichnung ist ungültig");
    }
    public function invite(Request $request){
        try{
            $event=Events::where('invitecode', $request->invitecode)->firstOrFail();
            return view("event.invite", compact("event"));
        }
        catch(ModelNotFoundException $ex){
            return redirect()->route('home')->with("error", "Dieser Einladungscode exsistiert leider nicht.");
        }

    }
    public function inviteDecision(String $value, String $uuid){
        if($value==="false"){
            return redirect()->route('home')->with("success", "Du hast das event Erfolgreich abgelehnt.");
        }
        elseif($value==="true"){
            return redirect()->route('home')->with("success", "Du hast dich erfolgreich für das Event angemeldet. <br> Viel Spaß!");
        }
    }
    public function shareinvite($uuid){
        try{
            $event=Events::where('uuid', $uuid)->firstOrFail();
            return view("event.invite", compact("event"));
        }
        catch(ModelNotFoundException $ex){
            return redirect()->route('home')->with("error", "Dieser Einladungscode exsistiert leider nicht.");
        }
    }
}
