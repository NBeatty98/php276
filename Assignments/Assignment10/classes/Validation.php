<?php

class Validation
{
  /* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
  private $error = false;

  /* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
  public function checkFormat($value, $regex)
  {
    switch ($regex) {

      case "name":
        return $this->name($value);

      case "address":
        return $this->address($value);

      case "city":
        return $this->city($value);

      case "phone":
        return $this->phone($value);

      case "email":
        return $this->email($value);

      case "dob":
        return $this->dob($value);

      case "password":
        return $this->password($value);



    }
  }



  /* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS*/
  private function name($value)
  {
    $match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
    return $this->setError($match);
  }
  private function address($value)
  {
    $match = preg_match("/^\d+\s+[\w\s#&.-]{1,50}$/i", $value);
    return $this->setError($match);
  }
  private function city($value)
  {
    $match = preg_match("/^[a-zA-ZÀ-ÖØ-öø-ſ]+(?:[\s-][a-zA-ZÀ-ÖØ-öø-ſ]+)*$/", $value);
    return $this->setError($match);
  }
  private function phone($value)
  {
    $match = preg_match("/^(?:\+?\d{1,3}[.-]?)?\(?(\d{3})\)?[.-]?(\d{3})[.-]?(\d{4})$/", $value);
    return $this->setError($match);
  }
  private function email($value)
  {
    $match = preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $value);
    return $this->setError($match);
  }
  private function dob($value)
  {
    $match = preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/(19|20)[0-9]{2}$|^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/2023$/", $value);
    return $this->setError($match);
  }
  private function password($value)
  {
    $match = preg_match("/^(?=.*[a-z])(?=.*[@$!%*#?&])[a-z@$!%*#?&]{5,20}$/i", $value);
    return $this->setError($match);
  }


  private function setError($match)
  {
    if (!$match) {
      $this->error = true;
      return "error";
    } else {
      return "";
    }
  }


  /* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
  public function checkErrors()
  {
    return $this->error;
  }

}