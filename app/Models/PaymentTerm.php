<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTerm extends Model
{
    use HasFactory;  
    use SoftDeletes;

    protected $fillable = [
        'condicao_pagamento',
        'multa',
        'juro',
        'desconto',
        'qtd_parcelas'
    ];

    protected $dates = ['deleted_at'];
}