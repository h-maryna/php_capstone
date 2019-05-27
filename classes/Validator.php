<?php

// Classes should be created one per file
// The file name for classesss should be identical to the class name
// eg: thois class should be saved in saved in a file call Validator.php
//
// Validator should do:
//
// 1. Validate any type of data
//
// 2. Track our errors
//
// 3. Give us the errors when we ask for them
namespace classes;

class Validator
{

   

    /**
     *  Collection of validation errors
     * @var array
     */
    private $errors = [];

    /**
     * Checking if all fields that required are filled in
     * @param  [type] $field [description]
     * @return error if detecting error
     */
    public function required($field)
    {
        if (!filter_input(INPUT_POST, $field)) {
            $this->setError($field, $field .' is a required field');
        }
    }
    
    //filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);
    //// filter\_input is now considered best practice for accerting
    // Superglobals
    public function email($field)
    {
        if (!filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL)) {
            $this->setError($field, 'Please provide a valid email address');
        }
    }
       /**
         * Ensure a value is provided for required field
         * @param string $field the field name
         * @return void
         */
    public function errors()
    {
            return $this->errors;
    }
        /**
         *  Set error message if a message has not alread
         *  been set for a field
         *  @param  String $field the field to set the error for
         *  @param  String $message the message
         *
        */
       
    private function setError($field, $message)
    {
        if (empty($this->errors[$field])) {
            $this->errors[$field] = $message;
        }
    }
    
    /**
     * Check if inputed field mathes with string
     * @param  String  $field to check if matches the pattern
     * @return [type]        [description]
     */
    public function string($field)
    {
        $string = filter_input(INPUT_POST, $field);
        $pattern = '/[a-zA-Z]{4,}/';
        if (!preg_match($pattern, $string)) {
            $this->setError($field, 'Please provide a valid' . ' ' . $field . ', should contain at least 4 characters');
        }
    }
    /**
     * Check integer field, needs to match with pattern
     * @param  integer $field and check if matches
     * @return [type]        [description]
     */
    public function integer($field)
    {
        $integer = filter_input(INPUT_POST, $field);
        $pattern = '/[1-9][0-9]{1,}+/';
        if (!preg_match($pattern, $integer)) {
            $this->setError($field, 'Please enter proper ' . ' ' . $field);
        }
    }
    
    /**
     * check this field to match with pattern
     * @param  postal code $field 
     * @return if not match show error
     */
    public function postal_code($field)
    {
        $postal_code = filter_input(INPUT_POST, $field);
        $pattern = '/[a-zA-Z][0-9][a-zA-Z][0-9][a-zA-Z][0-9]/';
        if (!preg_match($pattern, $postal_code)) {
            $this->setError($field, 'Please provide a valid Canadian postal code');
        }
    }
    
    /**
     * check password field
     * @param  password $field 
     * @return if not matches show error
     */
    public function password($field)
    {
        $password = filter_input(INPUT_POST, $field);
        $pattern = '/(?=.*[A-Z]+)(?=.*[$%^&@#!+-~]+).{4,}/'; //Myp@SSword3!
        //$pattern = '/[A-z]{6}/'; // for testing
        if (!preg_match($pattern, $password)) {
            $this->setError($field, 'Please provide a proper password, it should contain at least one number and at least one special character');
        }
    }
    
    /**
     * check if cvv code is meet requirements 
     * @param  cvv $field 
     * @return cvv
     */
    public function cvv($field)
    {
        $cvv = filter_input(INPUT_POST, $field);
        $pattern = '/[0-9]{3}/'; 
        if (!preg_match($pattern, $cvv)) {
            $this->setError($field, 'Please provide a proper cvv code, 3 numbers see back on your card');
        }
    }
    
    /**
     * chek if credit card field matches with pattern
     * @param  credit_card $field 
     * @return if not matches set error message
     */
    public function credit_card($field)
    {
        $credit_card = filter_input(INPUT_POST, $field);
        $pattern = '/[0-9]{16}/'; 
        if (!preg_match($pattern, $credit_card)) {
            $this->setError($field, 'Please provide a proper cvv code 16 characters');
        }
    }


}
