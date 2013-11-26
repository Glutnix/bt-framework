<?php
/*
**  This class will contain common function (methods) for validating
**  form entries
*/
class Validation
{
    static public function checkRequired($field)
    {
        if (!$field) {
            return 'Required field';
        }
    }

    public static function checkName($name)
    { // checking names, firstname, surname etc
        if (!preg_match('/^[[:alpha:][:blank:]\']+$/',$name)) {
            return "Invalid Name";
        }
    }

    public static function checkEmail($email)
    { // checking for a valid email
        if (!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9_\-\.]+\.[a-zA-Z0-9_\-]+$/',$email)) {
            return "Invalid Email Address";
        }
    }

    public static function checkNumeric($field)
    {   //  checking value accepted as a parameter is a number
        if (!is_numeric($field)) {
            return 'This must be a number';
        }
    }


    static public function checkDateField($month, $day, $year)
    {
        if (!is_numeric($month) || !is_numeric($day) || !is_numeric($year) || !checkdate($month, $day, $year)) {
            return 'Invalid date';
        }
    }

    public static function checkSelectField($field, $options, $key='')
    //  $field is the variable being checked
    //  $options is the array of options where $field is checked against
    //  $key indicates whether to use the keys (when present) or the values of the elements in the array
    {
        if ($key && array_key_exists($field, $options)) {
            //  validation is good, don't set an error message
            return false;
        }
        if (!$key && in_array($field, $options)) {
            //  validation is good, don't set an error message
            return false;
        }
        return 'Invalid Option';
    }

    public static function checkErrorMessages($result)
    {       //  check if there is at least one error message in the array of error messages
        foreach ($result as $errorMsg) {
            if (strlen($errorMsg) > 0) {
                return false;
            }
        }
        return true;
    }

}
