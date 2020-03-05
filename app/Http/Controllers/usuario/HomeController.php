<?php

namespace App\Http\Controllers\usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use Session;

class HomeController extends Controller
{
    public function index(){
        $id = Auth::id();
        $tickets = Ticket::where('id_user', '=' , $id)->orWhereNull('id_user')->get();
        return view('keiron.usuario',compact('tickets'));
    }

    public function asignarTicket(Request $request){
        $user = Auth::user();
        $ticket = Ticket::find($request->ticket);
        $ticket->id_user = $user->id;
        $ticket->save();

        Session::flash('success', 'Ticket Tomado');
        return redirect()->route('usuario_index');
    }
}
