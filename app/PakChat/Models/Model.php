<?php
namespace PakChat\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Validation\Factory;
use Symfony\Component\Translation\Translator;

// base model class

class Model extends Eloquent
{
    public static $errors = null;

    protected static $messages = array(
        'required' => ':attribute is required.',
        'min' => ':attribute must be at least :min characters long.',
        'max' => ':attribute must be a maximum of :max characters long.',
        'between' => ':attribute must be between :min - :max characters long.',
        'email' => ':attribute must be a valid email address',
        'confirmed' => ':attribute must match with confirm field.',
    );

    public static function validate($formData)
    {
        $factory = new Factory(new Translator('en'));
        $v = $factory->make($formData, static::$rules, static::$messages);

        if ($v->fails()) {

            $errors = array();
            foreach ($v->messages()->all('<li>:message</li>') as $error) {
                $errors[] = $error;
            }

            static::$errors = implode("", $errors);

            return false;
        }

        return true;
    }
}