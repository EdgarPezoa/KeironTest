<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'ticket_pedido'
    ];
}
