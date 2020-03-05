<?php

namespace App\Http\Controllers\usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('keiron.usuario');
    }

    public function asignarTicket($ticketId){
        $user = Auth::user();
        $ticket = Ticket::find($ticketId);
        $ticket->id_user = $user->id;
        $ticket->save();

        return redirect()->route('usuario_index');
    }
}
