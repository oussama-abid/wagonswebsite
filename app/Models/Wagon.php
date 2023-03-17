<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wagon extends Model
{
    use HasFactory;
    protected $fillable = [
        'wagennummer',
        'gattungsbuchstabe',
        'längeüberpuffer',
        'eigenmasse',
        'AnzahlderAcshen',
        'GewichtderLadung',
        'Bremsgewicht',
        'lastwechselundbremsgewicht',
        'bremsstellung',
        'hinweisezureibungsbremse',
        'bemerkungenzurfeststellbremse',
        'bemerkung',
        'Schadwagen',
        'Beladenmitgefahrgut',
        'UNNummer',
        'versandbanhof',
        'bestimmungsbanhof',
        'datum',
        'a','b','d','e','k','l','h','sh','bm','fir','sec','thir','four','five','ge','arch','idboss','iduser','bremsgewichte','revsdatum','gultigkeit','empty','sonstigebemerkungen','zugid','maxzuladung','alertdate'
    ];
}
