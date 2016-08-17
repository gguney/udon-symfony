<?php
/**
 * Created by PhpStorm.
 * User: GG
 * Date: 28.02.2016
 * Time: 23:46
 */

namespace AdminBundle\Validator;

use Symfony\Component\Debug\Exception\ContextErrorException;

class Validator{

    private $errors = array(
        "required" => " can not be empty.",
        "numeric"    =>  " must be a number or number format."

    );
    /*
E-Mail
  Size
   Min
    Max
   Between
   String
    Numeric
Boolean


    Accepted
Active URL
After (Date)
Alpha
Alpha Dash
Alpha Numeric
Array
Before (Date)


Confirmed
Date
Date Format
Different
Digits
Digits Between
Exists (Database)
Image (File)
In
Integer
IP Address
JSON
MIME Types (File)
Not In
Numeric
Regular Expression
Required
Required If
Required Unless
Required With
Required With All
Required Without
Required Without All
Same
Timezone
Unique (Database)
URL






     */
    public function __construct()
    {


    }
    public function validate($array, $rules)
    {
        foreach (array_keys($array) as $key )
        {
            try{
                $value = $array[$key];
                $rules = $rules[$key];
                $rulesArray = explode("|",$rules);
                foreach($rulesArray as $rule)
                {
                    if(!$this->$rule($key,$value))
                        dump($key.$this->errors[$rule]);
                }

            }
            catch (ContextErrorException $ex)
            {

            }
        }



        die;
    }
    public function required($key,$value)
    {
        $value = trim($value);
        if($value != null || $value != "")
            return true;
        else
            return false;
    }
    public function numeric($key,$value)
    {
        return false;
    }

}