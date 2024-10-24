<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    protected $table = 'navigation';

    protected $fillable = [
        'name',
        'url',
        'icon',
        'main_menu'
    ];
    protected $guard = ['id'];

    public function subMenus(){
        return $this->hasMany(Navigation::class,'main_menu');
    }

    public function mainMenus(){
        return $this->belongsTo(Navigation::class,'main_menu');
    }
}
