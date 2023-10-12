<?php 

// create a user validator class to handle validation
//constructor which takes in POST data from form
//check required fields to check are present in the data
//create methods to validate individual fields :-
//-- method to valid username  //-- method to validate an email
//return an error array once all checks are done


// create a user validator class to handle validation
class UserValidator{
    private $data;
    private $errors = [];
    private static $fields = ['username', 'email'];


//constructor which takes in POST data from form
public function __construct($post_data){
    $this->data = $post_data;
  }


//check required fields to check are present in the data
public function validateForm(){
    foreach(self::$fields as $field){
        if(!array_key_exists($field, $this->data)){
            trigger_error("$field is not present in data");
        }
    }

    $this->validateUsername();
    $this->validateEmail();

    return $this->errors;
}

//-- method to valid username
private function validateUsername(){
    $val = trim($this->data['username']); //no whitespace

    if(empty($val)){
        $this->addError( 'username','username cannot be empty');
    }else{
        if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) //at least 6 char long and max 12 char long
        {
            $this->addError('username','username must be 6-12 chars & alpha-numeric');
        }
    }
    
}

//-- method to validate an email
private function validateEmail(){
    $val = trim($this->data['email']); //trim off whitespace

    if(empty($val)){
        $this->addError( 'email','email cannot be empty');
    }else{
        if(!filter_var($val, FILTER_VALIDATE_EMAIL)) //at least 6 char long and max 12 char long
        {
            $this->addError('email','email must be valid');
        }
    }
}

//return an error array once all checks are done
private function addError($key, $val){
    $this->errors[$key] = $val;
}
}

?>