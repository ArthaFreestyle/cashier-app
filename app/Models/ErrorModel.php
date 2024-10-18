<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorModel extends Model
{
    use HasFactory;

    protected $table = 'i_error_application';

    protected $guard = ['id'];

    protected $fillable = [
        'ID_USER',
        'Controller',
        'Function',
        'Error_Line',
        'Error_Message',
    ];

    public function getUser(){
        return $this->BelongsTo(User::class,'USER_ID');
    }
}
