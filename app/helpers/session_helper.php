<?php
declare(strict_types = 1);
    session_start();

//    Flash message helper function
//    EXAMPLE - flash('register_success', 'You are now registered', 'alert alert-danger');
//    DISPLAY IN THE VIEW - <?php echo flash('register_success');
    function flash(string $name = "", string $message = "", string $class = 'alert alert-success') {
        if(!empty($name)){
            if(!empty($message) && empty($_SESSION[$name])){
                if(!empty($_SESSION['name'])){
                    unset($_SESSION['name']);
                }
                if(!empty($_SESSION[$name . '_class'])){
                    unset($_SESSION[$name . '_class']);
                }
                $_SESSION[$name] = $name;
                $_SESSION[$name . '_class'] = $class;
            } elseif(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . "_class"] : '';
                echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . "_class"]);
            }
        }
    }
