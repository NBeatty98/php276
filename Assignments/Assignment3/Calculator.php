<?php 

 class Calculator{

    // function calc($operator, $firstNumber = "null", $secNumber = "null"){
    //     try{
    //         return $this->checkIsNumeric($operator, $firstNumber, $secNumber);
    //     } catch (ArgumentCountError $e){
    //         echo "You must enter a string and two numbers. <br>";
    //     }
    // }

        function calc($operator, $firstNumber = "null", $secNumber = "null"){

        if(is_numeric($firstNumber) == true && is_numeric($secNumber) == true ){
            return $this->checkOperator($operator, $firstNumber, $secNumber);
        }
        return "You must enter a string and two numbers. <br>";
    }


        function checkOperator($operator, $firstNumber, $secNumber){
        switch($operator){

        case "+":
           return $this->add($firstNumber, $secNumber);

        case "-":
          return $this->subtract($firstNumber, $secNumber);
        
        case "/":
            if($secNumber==0){
                return "Cannot divide by zero <br>";
            }else{
           return $this-> divide($firstNumber, $secNumber);
            }

        case "*":
            return $this->multiply($firstNumber, $secNumber);
        }

    }

    private function add($num1, $num2){
        $result = $num1+$num2; 
        return "The product of the numbers is ".$result."<br>";
    }

    private function subtract($num1, $num2){
        $result = $num1-$num2; 
        return "The difference of the numbers is ".$result."<br>";
    }

    private function divide($num1, $num2){
        $result = $num1/$num2; 
        return "The division of the numbers is ".$result."<br>";
    }

    private function multiply($num1, $num2){
        $result = $num1*$num2; 
        return "The sum of the numbers is ".$result."<br>";
    }
}

?>