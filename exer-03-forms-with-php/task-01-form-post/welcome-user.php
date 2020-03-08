<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>welcome-user</title>
    </head>
    <body>
        <?php
            function formatInput($formField) {
                $formField = trim($formField);
                $formField = stripslashes($formField);
                $formField = htmlspecialchars($formField);
                
                return $formField;
            }

            function testEmail($emailField, &$validData, &$inputDataErrors) {
                $emailPattern = "/[A-Za-z]+[1-9]+@[a-z]+\.[A-Za-z]/";

                if (empty($emailField)) {
                    $inputDataErrors['email'] = 'error : email field is required';                    
                } 
                elseif (strlen($emailField) > 10) {
                    $inputDataErrors['email'] = 'error : email field has max lenght 10 chars'; 
                }
                elseif (!preg_match($emailPattern, $emailField)) {
                    $inputDataErrors['email'] = 'error : email field doesn\'t specify a correct email address';
                }
                else {
                    $validData['email'] = formatInput($emailField);
                }
            }

            function testUsername($usernameField, &$validData, &$inputDataErrors) {
                if (empty($usernameField)) {
                    $inputDataErrors['username'] = 'error : username field is required';                    
                } 
                elseif (strlen($usernameField) > 10) {
                    $inputDataErrors['username'] = 'error : username field has max lenght 10 chars'; 
                }
                else {
                    $validData['username'] = formatInput($usernameField);
                }
            }

            $validData = array();
            $inputDataErrors = array();

            testEmail($_POST['emailField'], $validData, $inputDataErrors);
            testUsername($_POST['usernameField'], $validData, $inputDataErrors);
            $validData['password'] = formatInput($_POST['passwordField']);

            if (!empty($inputDataErrors)) {
                echo '<h1>errors : </h1>';

                echo '<ul>';
                foreach ($inputDataErrors as $field => $error) {
                    echo '<li>' . $field . " -> " . $error . '</li>';
                }
                echo '</ul>';
            }

            echo '<h1>Welcome ' . $validData['username'] . '!</h1>';
            echo '<h1>your email is ' . $validData['email'] . '</h1>';

        ?>
    </body>
</html>