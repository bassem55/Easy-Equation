<?php

function q_equation($equation)
{
    
    $equation1 = get_nice_equation($equation);
    
    $q = q_factor($equation1);
    $q_factor = $q[0];
    $sign_q_factor = sign_q_factor($equation1);
    
    $s = s_factor($equation1);
    $s_factor = $s[0];
    $sign_s_factor = sign_s_factor($equation1);
    
    $third = third_factor($equation1);
    $third_factor = $third[0];
    $sign_third_factor = sign_third_factor($equation1);
    
    $char = first_char($equation1);
    
    
    /*
     * equation will be like 3x^2 - 5x + 9 = 0
     * 
     *   q_factor          ==> 3
     *   sign_q_factor     ==> +
     * 
     *   s_factor          ==> 5
     *   sign_s_factor     ==> -
     * 
     *   third_factor      ==> 9
     *   sign_third_factor ==>+
     *   
     *   
     * */
    
    
    if($sign_s_factor == "-")
    {
        $s_num = get_m($s_factor);
    }
    else if($sign_s_factor == "+")
    {
        $s_num = $s_factor;
    }
    $solutions = '';
    
    //if sign of third factor - so the two possible solution will have different signs
    if($sign_third_factor == '-')
    {
        /*
           get result of multiply two numbers that will be the result of them  = q_factor
           get result of multiply two numbers that will be the result of them  = third factor
        
        */
        
        //s_factor delivered to us in positive
        
        
        $q_arr = multiply($q_factor);
        $t_arr = multiply($third_factor);
        for($i=0;$i<count($q_arr) ; $i++)
        {
            $q_arr2 = $q_arr[$i];
            
            $q_num1 = $q_arr2[0];
            $q_num2 = $q_arr2[1];
            
            
            
            $m_q_num1 = get_m($q_num1);
            $m_q_num2 = get_m($q_num2);
            for($i2 = 0;$i2< count($t_arr) ; $i2++)
            {
                $t_arr2  = $t_arr[$i2];
                
                $t_num1 = $t_arr2[0];
                $t_num2 = $t_arr2[1];
                
                
                
                $m_t_num1 = get_m($t_num1);
                $m_t_num2 = get_m($t_num2);
                
                
                /*on this we will two res  
                 * 
                 * res1 ==> (q_num1 * t_num2) positive
                 * res2 ==> (q_num2 * t_num1) nagative
                 */
                
                $res1 = ($q_num1 * $t_num2) + get_m($q_num2 * $t_num1);
                
                $res2 = get_m($q_num1 * $t_num2) + ($q_num2 * $t_num1);
                
                //we try res1 and res2 == s_factor to make sure that we choose correct signs in correct position
                
              
                if($res1 == $s_num)
                {
                    
                    
                    /*
                     in res1 the t_num2 is positive
                              the t_num1 is nagative
                              
                     so in res1 first_x will be nagative of t_num2 and  / q_num1
                               secand_x will be positive of t_num1 and  / q_num2
                               
                     */
                    $step0 = $equation . "<br>";
                    $step1 = "( " . $q_num1 . $char ." - " . $t_num1 . " ) " . " ( " . $q_num2 . $char . " + " . $t_num2 . " ) = 0". "<br>";
                    $step2 =  "( " . $q_num1 . $char . " - " . $t_num1 . " ) = 0  ||" . " ( " . $q_num2 . $char . " + " . $t_num1 . " ) = 0". "<br>";
                    
                    if($q_num1 != 1)
                    {
                        $step3 = "---------------------------------------------------". "<br>";
                        $step4 = "( " . $q_num1 . $char . " - " . $t_num1 . " ) = 0". "<br>";
                        $step5 = $q_num1 . $char . " = " .  $t_num1. "<br>";
                        $step6 = $char . " = " . $t_num1  . " / " . $q_num1 . "<br>";
                        $step7 = $char . " = " . $t_num1 / $q_num1. "<br>";
                        $step8 = "---------------------------------------------------". "<br>";
                    }   
                    else if($q_num1 == 1)
                    {
                        $step3 = "---------------------------------------------------". "<br>";
                        $step4 = "( " . $q_num1 . $char . " - " . $t_num1 . " ) = 0". "<br>";
                        $step5 = $char . " = " .  $t_num1. "<br>";
                        $step6 = "";
                        $step7 = "";
                        $step8 = "---------------------------------------------------". "<br>";
                    }  
                    if($q_num2 != 1)
                    {
                        $step9 = "---------------------------------------------------". "<br>";
                        $step10 = "( " . $q_num2 . $char . " + " . $t_num2 . " ) = 0". "<br>";
                        $step11  = $q_num2 . $char . " = " .  get_m($t_num2). "<br>";
                        $step12 = $char . " = " . get_m($t_num2) . " / " . $q_num2 . "<br>";
                        $step13 = $char . " = " . get_m($t_num2)  / $q_num2 . "<br>";
                        $step14 = "---------------------------------------------------". "<br>";
                    }  
                    else if($q_num2 == 1)
                    {
                        $step9 = "---------------------------------------------------". "<br>";
                        $step10 = "( " . $char . " + " . $t_num2 . " ) = 0". "<br>";
                        $step11  =  $char . " = " . get_m($t_num2). "<br>";
                        $step12 = "";
                        $step13 = "";
                        $step14 = "---------------------------------------------------". "<br>";
                    }
                     
                    
                        
                    //$first_x = get_m($t_num1) / $q_num1;
                    //$secand_x  = $t_num2 / $q_num2;
                    
                    $steps = $step0 . $step1 . $step2 . $step3 . $step4 . $step5 . $step6 . $step7 . $step8 . $step9 . $step10 . $step11 . $step12 . $step13 . $step14;
                    
                     $solutions .= "<br><br>"."|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||"."<br><br>" .$steps;
                   
                }
                else if($res2 == $s_num)
                {
                   
                    /*
                     in res2 the t_num2 is nagative
                             the t_num1 is positive
                     
                     so in res1 first_x will be positive of t_num2 and  / q_num1
                               secand_x will be nagative of t_num1 and  / q_num2
                     
                     */
                    $step0 = $equation. "<br>";
                    $step1 = "( " . $q_num1 . $char ." + " . $t_num1 . " ) " . " ( " . $q_num2 . $char . " - " . $t_num2 . " ) = 0" . "<br>";
                    $step2 = "( " . $q_num1 . $char . " + " . $t_num1 . " ) = 0 || ( " . $q_num2 . $char . " - " . $t_num2 . " ) = 0". "<br>";
                    
                    if($q_num1 != 1)
                    {
                        $step3 = "---------------------------------------------------". "<br>";
                        $step4 =  "( " . $q_num1 . $char . " + " . $t_num1 . " ) = 0". "<br>";
                        $step5 = $q_num1 . $char . " = " .  get_m($t_num1). "<br>";
                        $step6 = $char . " = " . get_m($t_num1)  . " / " . $q_num1 . "<br>";
                        $step7 = $char . " = " . get_m($t_num1) / $q_num1. "<br>";
                        $step8 = "---------------------------------------------------". "<br>";
                    }
                    else if($q_num1 == 1)
                    {
                        $step3 = "---------------------------------------------------". "<br>";
                        $step4 =  "( " . $char . " + " . $t_num1 . " ) = 0". "<br>";
                        $step5 = $char . " = " .  get_m($t_num1). "<br>";
                        $step6 = "";
                        $step7 = "";
                        $step8 = "---------------------------------------------------". "<br>";
                    }
                    if($q_num2 != 1)
                    {
                        $step9 = "---------------------------------------------------". "<br>";
                        $step10 =  "( " . $q_num2 . $char . " - " . $t_num2 . " ) = 0". "<br>";
                        $step11 =  $q_num2 . $char . " = " .  $t_num2. "<br>";
                        $step12 = $char . " = " . $t_num2 . " / " . $q_num2 . "<br>";
                        $step13 = $char . " = " . $t_num2  / $q_num2. "<br>";
                        $step14 = "---------------------------------------------------". "<br>";
                    }
                    else if($q_num2 == 1)
                    {
                        $step9 = "---------------------------------------------------". "<br>";
                        $step10 =  "( " . $char . " - " . $t_num2 . " ) = 0". "<br>";
                        $step11 = $char . " = " . $t_num2  / $q_num2. "<br>";
                        $step12 = "";
                        $step13 = "";
                        $step14 = "---------------------------------------------------". "<br>";
                    }
                    
                    
                    
                    //$first_x = $t_num1 / $q_num1;
                    //$secand_x = get_m($t_num2) / $q_num2;
                    
                    $steps = $step0 . $step1 . $step2 . $step3 . $step4 . $step5 . $step6 . $step7 . $step8 . $step9 . $step10 . $step11 . $step12 . $step13 . $step14;
                    
                    $solutions .= "<br><br>"."|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||"."<br><br>" .$steps;
                    
                }
                else
                {
                    continue;
                }
                
            }
            
                
        }     
    }
    //if sugn of third factor is + so the sign of each solution equal the sign of secand factor (-3x) - ==> the sign of two solution
    else if($sign_third_factor == "+")
    {
        /*if he come here so
         * 
         * if sign of s_factor == (-)
         the sign of arr2[0] is -  (X - arr2[0])
         the sign of arr2[1] is -  (X - arr2[1])
         
         but must the sum of arr2[0] and arr2[1] equel s_factor
         (X - arr2[0]) (X - arr2[1]) = 0
         
         (X - arr2[0]) = 0 |||| (X - arr2[1]) = 0
         
         X = - arr2[0]     |||| X = arr2[1]
         */
        $q_arr = multiply($q_factor);
        $t_arr = multiply($third_factor);
        for($i=0;$i<count($q_arr) ; $i++)
        {
            $q_arr2 = $q_arr[$i];
            
            $q_num1 = $q_arr2[0];
            $q_num2 = $q_arr2[1];
            
           
            for($i2 = 0;$i2< count($t_arr) ; $i2++)
            {
                $t_arr2  = $t_arr[$i2];
                
                $t_num1 = $t_arr2[0];
                $t_num2 = $t_arr2[1];
                
                
                
                $m_t_num1 = get_m($t_num1);
                $m_t_num2 = get_m($t_num2);
                
                
            if($sign_s_factor == "-")//if (-) so the two sign of num1 and num2 == (-)
            {
                
                
                $res = get_m($q_num1 * $t_num2) + get_m($q_num2 * $t_num1);
                
                
                
                if($res == $s_num)
                {
                    // first x will be the positive of t_num2 / q_num1
                    //secand x will be the positive of t_num1 / q_num2
                    
                    $step0 = $equation. "<br>";
                    $step1 = "( " .$q_num1 . $char . " - " . $t_num1 . " ) ( " . $q_num2 . $char . " - " . $t_num2 . " ) = 0" . "<br>";
                    $step2 = "( " .$q_num1 . $char . " - " . $t_num1 . " ) = 0 ||  ( " . $q_num2 . $char . " - " . $t_num2 . " ) = 0". "<br>";
                    
                    if($q_num1 != 1)
                    {
                        $step3 = "---------------------------------------------------". "<br>";
                        $step4 = "( " .$q_num1 . $char . " - " . $t_num1 . " ) = 0 ". "<br>";
                        $step5 = $q_num1 . $char . " = " . $t_num1. "<br>";
                        $step6 = $char ." = ". $t_num1 ." / " . $q_num1. "<br>";
                        $step7 = $char ." = ". $t_num1  / $q_num1. "<br>";
                        $step8 = "---------------------------------------------------". "<br>";
                        
                    }
                    else if($q_num1 == 1)
                    {
                        $step3 = "---------------------------------------------------". "<br>";
                        $step4 = "( " . $char . " - " . $t_num1 . " ) = 0 ". "<br>";
                        $step5 = $char . " = " . $t_num1. "<br>";
                        $step6 = "";
                        $step7 = "";
                        $step8 = "---------------------------------------------------". "<br>";
                    }
                    if($q_num2 != 1)
                    {
                        $step9 = "---------------------------------------------------". "<br>";
                        $step10 = "( " .$q_num2 . $char . " - " . $t_num2 . " ) = 0 ". "<br>";
                        $step11 = $q_num2 . $char . " = " . $t_num2. "<br>";
                        $step12 = $char . " = " . $t_num2 ." / " . $q_num2. "<br>";
                        $step13 = $char . " = " . $t_num2  / $q_num2. "<br>";
                        $step14 = "---------------------------------------------------". "<br>";
                    }
                    else if($q_num2 == 1)
                    {
                        $step9 = "---------------------------------------------------". "<br>";
                        $step10 = "( " .$q_num2 . $char . " - " . $t_num2 . " ) = 0 ". "<br>";
                        $step11 = $char . " = " . $t_num2. "<br>";
                        $step12 = "";
                        $step13 = "";
                        $step14 = "---------------------------------------------------". "<br>";
                    }
                    
                    //$first_x  = $t_num2 / $q_num1;
                    //$secand_x = $t_num1 / $q_num2;
                    
                    $steps = $step0 . $step1 . $step2 . $step3 . $step4 . $step5 . $step6 . $step7 . $step8 . $step9 . $step10 . $step11 . $step12 . $step13 . $step14;
                    
                    $solutions .= "<br><br>"."|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||"."<br><br>" .$steps;
                    
                }
                else
                {
                    continue;
                }
            }
            else if($sign_s_factor == "+")//if (+) so the two sign of num1 and num2 == (+)
            {
                $res = ($q_num1 * $t_num2) + ($q_num2 * $t_num1);
                
                if($res == $s_num)
                {
                    // first x will be the nagative of t_num2 / q_num1
                    //secand x will be the nagative of t_num1 / q_num2
                    
                    
                    $step0 = $equation. "<br>";
                    $step1 = "( " .$q_num1 . $char . " + " . $t_num1 . " ) ( " . $q_num2 . $char . " + " . $t_num2 . " ) = 0" . "<br>";
                    $step2 = "( " .$q_num1 . $char . " + " . $t_num1 . " ) = 0 ||  ( " . $q_num2 . $char . " + " . $t_num2 . " ) = 0". "<br>";
                    
                    if($q_num1 != 1)
                    {
                        $step3 = "---------------------------------------------------". "<br>";
                        $step4 = "( " .$q_num1 . $char . " + " . $t_num1 . " ) = 0 ". "<br>";
                        $step5 = $q_num1 . $char . " = " . get_m($t_num1). "<br>";
                        $step6 = $char ." = ". get_m($t_num1) ." / " . $q_num1. "<br>";
                        $step7 = $char ." = ". get_m($t_num1)  / $q_num1. "<br>";
                        $step8 = "---------------------------------------------------". "<br>";
                        
                    }
                    else if($q_num1 == 1)
                    {
                        $step3 = "---------------------------------------------------". "<br>";
                        $step4 = "( " . $char . " + " . $t_num1 . " ) = 0 ". "<br>";
                        $step5 = $char . " = " . get_m($t_num1). "<br>";
                        $step6 = "";
                        $step7 = "";
                        $step8 = "---------------------------------------------------". "<br>";
                    }
                    if($q_num2 != 1)
                    {
                        $step9 = "---------------------------------------------------". "<br>";
                        $step10 = "( " .$q_num2 . $char . " + " . $t_num2 . " ) = 0 ". "<br>";
                        $step11 = $q_num2 . $char . " = " . get_m($t_num2). "<br>";
                        $step12 = $char . " = " . get_m($t_num2) ." / " . $q_num2. "<br>";
                        $step13 = $char . " = " . get_m($t_num2)  / $q_num2. "<br>";
                        $step14 = "---------------------------------------------------". "<br>";
                    }
                    else if($q_num2 == 1)
                    {
                        $step9 = "---------------------------------------------------". "<br>";
                        $step10 = "( " . $char . " + " . $t_num2 . " ) = 0 ". "<br>";
                        $step11 = $char . " = " . get_m($t_num2). "<br>";
                        $step12 = "";
                        $step13 = "";
                        $step14 = "---------------------------------------------------". "<br>";
                    }
                    
                    //$first_x  = get_m($t_num1 / $q_num1);
                    //$secand_x = get_m($t_num2 / $q_num2);
                    $steps = $step0 . $step1 . $step2 . $step3 . $step4 . $step5 . $step6 . $step7 . $step8 . $step9 . $step10 . $step11 . $step12 . $step13 . $step14;
                    
                    $solutions .= "<br><br>"."|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||"."<br><br>" .$steps;
                    
                }
                else
                {
                    continue;
                }
            }
          }
        }
    }
    
    if($solutions == '')
        return "this equation has not solution";
    else
        return $solutions;
}
function multiply($num)
{
    /*
     * this function used to get the Multiplying of two number and the result is $num
     *
     *
     */
    $possible_solution = array();
    $ps_counter = 0;
    
    $data = array();
    $data_counter = 0;
    for($i1 = 1;$i1<=10;$i1++)
    {
        for($i2 = 1;$i2<=10;$i2++)
        {
            if(($i2 * $i1) == $num)
            {
                
                $data[$data_counter] = array($i1 , $i2);
                $data_counter++;
                
            }
        }
    }
    return $data;
}    
function get_m($num)
{
    //this function used to the nagative value of any value entered ($num)
    return $num - ($num + $num);
}
function is_sign($char)
{
    //this function return true if the char is sign 
    if($char == "-" || $char == "+")
    {
        return true;
    }
    else
        return false;
}
function get_nice_equation($equation)
{
    /*
     * this function used to set the equation on right standard
     *
     * if the equation written like this x^2+x-20=0
     *
     * the function will return 1x^2+1x-20=0
     */
    
    $equation = str_replace(' ' , '' ,$equation);
    
    $first_char = first_char($equation);
    $pos_f_char = strpos($equation,$first_char);
    
    
    if($pos_f_char == 0)
    {
        $equation1 = '1' . $equation;
    }
    else if(is_sign($equation[$pos_f_char - 1]) && $pos_f_char == 1)
    {
        $equation1 = $equation[0] . '1' . substr($equation , 1);
    }
    else
    {
        $equation1 = $equation;
    }
    
    
    $new_equation = '';
    if(filter_var($equation1[$pos_f_char - 1] , FILTER_VALIDATE_INT) || $equation1[$pos_f_char -1] == "0")
    {
        $new_equation = $equation1;
        
    }
    else
    {
        for($i=0;$i<strlen($equation1);$i++)
        {
            if($i == $pos_f_char)
                $new_equation .= '1';
                
                $new_equation .= $equation1[$i];
        }
    }
    $arr = secand_char($new_equation);
    $secand_char = $arr[0];
    $pos_s_char = $arr[1];
    
    
    $new_equation2 = '';
    if(filter_var($new_equation[$pos_s_char - 1] , FILTER_VALIDATE_INT) || $new_equation[$pos_s_char -1] == "0")
    {
        $new_equation2 = $new_equation;
        
    }
    else
    {
        for($i=0;$i<strlen($new_equation);$i++)
        {
            if($i == $pos_s_char)
                $new_equation2 .= '1';
                
                $new_equation2 .= $new_equation[$i];
        }
    }
    /*
     * if the equation written like this x^2-x+3 = 1
     * we want change the standard to be like this x^2 - x  + 3 -1 = 0  
     */
    
    $fourth_factor = fourth_factor($new_equation2);
    $sign_fourth = sign_fourth_factor($new_equation2);
    
    $t_arr = third_factor($new_equation2);
    $third_factor = $t_arr[0];
    $pos_third = $t_arr[1];
    
    $sign_third = sign_third_factor($new_equation2);
    
    if($fourth_factor != 0)
    {
        //here we want to know the sign of fourth factor 
       
        if($sign_fourth == "+")
        {
            //here we want Subtraction the third factor from fourth factor 
            
            if($sign_third == "+")
            {
                $new_third = $third_factor - $fourth_factor;
            }
            else if($sign_third == "-")
            {
                $new_third = get_m($third_factor) - $fourth_factor;
            }
        }
        else if($sign_fourth == "-")
        {
            //here we want sum the third factor with fourth factor
            if($sign_third == "+")
            {
                
                $new_third = $third_factor + $fourth_factor;
            }
            else
            {
                $new_third = get_m($third_factor) + $fourth_factor;
            }
        }
        else
        {
            //there no probability to come here
            return "fuck";
        }
        //we want to know the sign of new third factor
        if($new_third > 0)
        {
            //so the sign is +
            //if sign is + so we will put + sign to equation on the place of old third factor
            if($pos_third == 0)//so he write the third factor on first
            {
                $substr = substr($new_equation2 , ($pos_third + strlen($third_factor) - 1));
                $new_equation3 = $new_third . $substr;
            }
            else
            {
                if($sign_third == "+" || $sign_third == "-")
                {
                    //so we will just change the number
                    
                    
                    $test_equation = '';
                    for($i=0;$i<strlen($new_equation2);$i++)
                    {
                        if($i == $pos_third -1)
                        {
                            $test_equation .=  "+" . $new_third;
                            $i = $pos_third + strlen($third_factor) -1 ;
                        }
                        else
                        {
                            $test_equation .= $new_equation2[$i];
                        }
                    }
                    
                    $new_equation3 = $test_equation;
                }
               
                   
            }
        }
        else
        {
            //so the sign of new third -
            
            if($pos_third == 0)//so he write the third factor on first
            {
                $substr = substr($new_equation2 , ($pos_third + strlen($third_factor) - 1));
                $new_equation3 = "-" . $new_third . $substr;
            }
            else
            {
                if($sign_third == "+" || $sign_third == "-")
                {
                    //in + and in - we will change it with 
                    
                    $test_equation = '';
                    for($i=0;$i<strlen($new_equation2);$i++)
                    {
                        if($i == $pos_third -1)
                        {
                            $test_equation .=  $new_third;
                            $i = $pos_third + strlen($third_factor) -1 ;
                        }
                        else
                        {
                            $test_equation .= $new_equation2[$i];
                        }
                    }
                    
                    $new_equation3 = $test_equation;
                }
                
            }
        }
    }
    else if($fourth_factor == 0)
    {
        //nothing will change
        $new_equation3 = $new_equation2;
    }
    //we want change the old fourth factor to be zero
    $arr = explode("=" , $new_equation3);
    
    $first_part = $arr[0];
    
    $new_equation4 = $first_part . "=0";
    
    
    
    /*
     * if the q_factor has nagative sign we will reverse all equation signs 
     * like this -x^2+4x-12=0
     * will be like this x^2-4x+12=0
     */
    $q = q_factor($new_equation4);
    $pos_sign_q = $q[1] - 1;
    
    
    $s = s_factor($new_equation4);
    $pos_sign_s = $s[1] -1;
    if($pos_sign_s == -1)
    {
        $pos_sign_s++;
    }
    $sign_s_factor = sign_s_factor($new_equation4); 
    
    $t = third_factor($new_equation4);
    $pos_sign_t = $t[1] -1;
    if($pos_sign_t == -1)
    {
        $pos_sign_t++;
    }
    $sign_t_factor = sign_third_factor($new_equation4);
    
    $sign_q_factor = sign_q_factor($new_equation4);
    if($sign_q_factor == "-")
    {
        $new_equation5 = '';
        for($i=0;$i<strlen($new_equation4);$i++)
        {
            if($i == $pos_sign_q)
            {
                $new_equation5 .= "+";
            }
            else if($i == $pos_sign_s)
            {
                
                if($sign_s_factor == "+")
                    $new_equation5 .= "-";
                else 
                    $new_equation5 .= "+";
                
                if($pos_sign_s == 0)
                {
                      $new_equation5 .= $new_equation4[$i];  
                }
            }
            else if($i == $pos_sign_t)
            {
                if($sign_t_factor == "+")
                    $new_equation5 .= "-";
                else
                    $new_equation5 .= "+";
                
                if($pos_sign_t == 0)
                   $new_equation5 .= $new_equation4[$i];
            }
            else
                $new_equation5 .= $new_equation4[$i];
        }
    }
    else
    {
        //nothing will be change
        $new_equation5 = $new_equation4;
    }
    
    return  $new_equation5;
}
function q_factor($string)
{
    /*
     *  string like this ==> 3s^2-4s+10=0
     *  q_factor ==> 3
     * 
     */
    
        $pos = strpos($string , "^2");
    
        $number1 = '';
        for($i = $pos-2;$i >= 0 ; $i--)
        {
            if(filter_var($string[$i] , FILTER_VALIDATE_INT) || $string[$i] == "0")
            {
                $number1 .= $string[$i];
                
                
            }
            else
                break;
        }
        $number = '' ;
        for($i=strlen($number1)-1  ;$i >=0 ; $i--)
        {
            $number .= $number1[$i];
        }
        
        $pos_num = ($pos - 1) - strlen($number); 
        
        return array((int)$number , $pos_num);
    
    
}
function s_factor($equation)
{
    /*
     *  string like this ==> 3s^2-4s+10=0
     *  s_factor ==> 4
     *
     * 
     */
    
    $first_char = first_char($equation);
    $pos_f_char = strpos($equation , $first_char);
    
    $arr = secand_char($equation);
    $secand_char = $arr[0];
    $pos_s_char = $arr[1];
    
    
    if($equation[$pos_f_char + 1] == "^")
    {
        $pos = $pos_s_char;
    }
    else
    {
        $pos = $pos_f_char;
    }
    
    $number1 = '';
    for($i = $pos-1;$i >= 0 ; $i--)
    {
        if(filter_var($equation[$i] , FILTER_VALIDATE_INT) || $equation[$i] == "0")
        {
            $number1 .= $equation[$i];
            
        }
        else
            break;
    }
    $number = '' ;
    for($i=strlen($number1)-1  ;$i >=0 ; $i--)
    {
        $number .= $number1[$i];
    }
    
    $pos_num = $pos - strlen($number);
    return array((int)$number , $pos_num);
    
    
}
function third_factor($equation)
{
    /*
     *  string like this ==> 3x^2-4x+10=0
     *  third_factor ==> 10
     *
     *  
     *  first we will remove q_factor and x^2 
     *  secand we will remove s_factor 
     *  
     *  finally get the finally result 10
     */
   
    //remove q_factor
    $q = q_factor($equation);
    $q_factor = $q[0];
    $pos_q = $q[1];
    
    $pos = strpos($equation , "^2");
    
    $remove_str =  $q_factor . $equation[$pos -1 ] ."^2";
    $equation2 = str_replace($remove_str , '' , $equation);
    
    //remove s_factor
    $s = s_factor($equation);
    $s_factor = $s[0];
    $pos_s = $s[1];
   
    
    
    $remove_str =   $s_factor . $equation[$pos_s + 1] ;
    
    $equation3 = str_replace($remove_str , '' , $equation2);
    
    //equation3 will be like this x+10=0 so the third factor equal first number will see
    
    $third_factor = first_number($equation3);
    
    $pos = strpos($equation , $third_factor);
    
    if($pos == $pos_q)
    {
        $pos2 = strrpos($equation , $third_factor);
        if($pos2 == $pos_s)
        {
            //if he come here so the equation written like this 3x^2-3x+3=0
            //so we will reverse the string and get again the sign 
               
            $rev_equation  = strrev($equation1);
            $pos_sign_rev = strpos($rev_equation , $third_factor);
            $pos = strlen($equation) - ($pos_sign_rev + 1);

        }
        else
        {
            $pos = $pos2;
        }
    }
    else if($pos == $pos_s)
    {
        $pos2 = strrpos($equation , $third_factor);
        if($pos2 == $pos_q)
        {
            //if he come here so the equation written like this 3x-3x^2+3=0
            //so we will reverse the string and get again the sign 
            $rev_equation  = strrev($equation1);
            $pos_sign_rev = strpos($rev_equation , $third_factor);
            $pos_sign = strlen($equation) - ($pos_sign_rev + 1);
            
        }
        else
            $pos = $pos2;
    }
    
    return array($third_factor , $pos);
    
    
}
function fourth_factor($equation)
{
    
    $arr = explode('=' , $equation);
    
    $number = '';
    if(count($arr) == 2)//so the string have = sign
    {
        $number = first_number($arr[1]);
    }
    else
    {
        $number = "0";
    }
    return (int)$number;
}
function first_number($string)
{
        $number = '';
        $number_start = false;
        for($i=0;$i<strlen($string);$i++)
        {
            
            if(filter_var($string[$i] , FILTER_VALIDATE_INT) || $string[$i] == "0")
            {
                $number_start = true;
                
                $number .= $string[$i];
                
                
            }
            else
            {
                if($number_start == true)
                    break;
                 else
                    continue;
            }
        }
    return $number;
}
function first_char($string)
{
    $new_string = str_replace('-' ,'',$string);
    $new_string = str_replace('+' ,'',$new_string);
    $new_string = str_replace('=' ,'',$new_string);
    $new_string = str_replace('*' ,'',$new_string);
    $new_string = str_replace('/' ,'',$new_string);
    $new_string = str_replace('^2' ,'',$new_string);
    for($i =0 ;$i<strlen($new_string) ; $i++)
    {
        
        if(filter_var($new_string[$i] , FILTER_VALIDATE_INT) || $new_string[$i] == "0")
        {
            continue;
        }
        else  
            return $new_string[$i];
    }
}
function secand_char($string)
{
    $char_counter = 0;
    
    for($i =0 ;$i<strlen($string) ; $i++)
    {
        
        if(filter_var($string[$i] , FILTER_VALIDATE_INT) || $string[$i] == "0")
        {
            continue;
        }
        else
        {
            
            if($string[$i] != '+' && $string[$i] != '-'&& $string[$i] != '=' && $string[$i] !='^')
            {
                $char_counter++;
                
                if($char_counter == 2)
                {
                    return array($string[$i] , $i);
                }
            }   
            else 
                continue;
            
            
        }
            
    }
}
function sign_q_factor($equation)
{
    $q = q_factor($equation);
    $pos_sign = $q[1] -1 ;
    
    if($equation[$pos_sign] == '-' || $equation[$pos_sign] == '+')
        return $equation[$pos_sign];
    else if(($q[1]) == 0 )//it is meaning that write on first so the sign equal +
        return "+";
    
    else
        return false;
}
function sign_s_factor($equation)
{
    $s = s_factor($equation);
    $pos_sign = $s[1] - 1;
    
    if($equation[$pos_sign] == '-' || $equation[$pos_sign] == '+')
        return $equation[$pos_sign];  
    else if(($s[1]) == 0 )//it is meaning that write on first so the sign equal +
        return "+";
    else
        return false;
}
function sign_third_factor($equation)
{
    $third = third_factor($equation);
    $pos_sign = $third[1] -1;
   
    
    if($equation[$pos_sign] == '-' || $equation[$pos_sign] == '+')
        return $equation[$pos_sign];
    else if(($third[1]) == 0 )//it is meaning that write on first so the sign equal +
         return "+";
    else
        return false;
}
function sign_fourth_factor($equation)
{
    $f_factor = (string)fourth_factor($equation);
    $pos_sign = strpos($equation , "=") + 1;
    
    
    if($f_factor == "0")
        return "zero";
    else if(filter_var($equation[$pos_sign] , FILTER_VALIDATE_INT))
        return "+";
    else if($equation[$pos_sign] == '-' || $equation[$pos_sign] == '+')
        return $equation[$pos_sign];
            
    else
       return false;
}

?>
<?php 
if(isset($_POST['equation']))
{
    $solutions = q_equation($_POST['equation']);
    echo $solutions;
}
?>
