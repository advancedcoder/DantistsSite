<?php 
    $first_name = htmlspecialchars($_POST["first_name"]);
    $second_name = htmlspecialchars($_POST["second_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);

    $errors = [
        'first' => check($first_name, "First name"),
        'second' => check($second_name, "Second name"),
        'last' => check($last_name, "Last name")
    ];

   
    if(empty($errors['first']) || empty($errors['second']) || empty($errors['last'])) {
        header('Location: '.'/no_error.php?result='.urlencode("No error has been found!"), true, 302);
        exit();
    } else {
        header('Location: '.'/form_server.php?errors[]='.urlencode($errors['first'])
                                                                   .'&errors[]='.urlencode($errors['second'])
                                                                   .'&errors[]='.urlencode($errors['last']), true, 302);
        exit();
    }

    function check ($var, $field_name) {
        $regex = "/[a-zA-Z]/";
        
        if (strlen($var) == 0) {
            return $field_name . " field is required!";
        }
        
        if (!preg_match($regex, $var)) {
            return $field_name . " can contain only english letters!";
        }
        
        return "";
    }
?>