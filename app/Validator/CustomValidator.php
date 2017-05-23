<?php
namespace App\Validator;
 
class CustomValidator extends \Illuminate\Validation\Validator
{

    public function validateAlphaNumCheck($attribute, $value, $parameters)
    {
        return preg_match('/^[A-Za-z\d]+$/', $value);
    }
     
}
