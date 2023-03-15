<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zug extends Model
{
    use HasFactory;
    protected $fillable =['name','nachname','versandbanhof','bestimmungsbanhof','datum','ref','zugnummer','Mindestbremshunderstel','bossid','userid','logo','seczugnummer','betriebsstelle','secbetriebsstelle','evu'];
}
