<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Ticket;

class HomeController extends Controller
{
    public function index(){
        $usuarios = User::all()->pluck('nombre' ,'id');
        $tickets = Ticket::all();
        return view('keiron.administrador', compact('usuarios', 'tickets'));
    }
}
