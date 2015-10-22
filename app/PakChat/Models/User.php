<?php
namespace PakChat\Models;

class User extends Model
{
    public $timestamps = true;

    protected static $rules = array(
        'name' => 'required|min:3',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:5',
        'gender' => 'required',
    );
}