<!DOCTYPE html>
<html>

    <head>
        <title>page title</title>
    </head>

    <body>

    <?php
        // generating tag with php
        echo "<h1>heading generated with php</h1>";
        
        // some variables
        $age = 24;
        $cash = 50.2;
        $isGreen = true;
        $greeting = 'hello my friend';
        $name = 'vitaly';
    
        echo "str1"."str2"."<br>";
        echo "$greeting $name"."<br>";
        echo '$greeting $name'."<br>";

        // another way to print stuff
        echo $age, ' ', $cash;

        // to cast to int, bec there is no integer division
        echo (int)(10 / 3); echo "<br>";

        echo 3 == "3"; echo "<br>";
        echo 3 === "3"; echo "<br>";

        function makeCoffee ($coffeeType = "espresso") {
            return "making a cup of $coffeeType"."<br>";
        }
         
        echo makeCoffee();
        echo makeCoffee(null);
        echo makeCoffee("late");        
        
        echo "<br>";

        // arrays actually are ordered map
        $myArr = array(1, 5);
        $myArrCount = count($myArr);

        $assocArr = array(
                            2 => "two",
                            21 => "twenty one",
                            1 => "one"
                        );

        // loops
        for ($i=0; $i < 10; $i++) { 
            echo "looping around $i-th time<br>";
        }

        foreach ($myArr as $element) {
            echo "$element<br>";
        }

        foreach ($assocArr as $key => $value) {
            echo "$key maps to $value<br>";
        }

        var_dump($assocArr); echo "<br>";

        echo "2's value is $assocArr[2]"."<br>";

        // arrays can have mixed types
        $arr2 = array(
            "foo" => "bar",
            "bar" => "foo",
            100   => -100,
            -100  => 100,
        );
        var_dump($arr2); echo "<br>";

        $array = array(
                "a",
                "b",
            6 => "c",
                "d",
        );

        // echo $array[5]."<br>"; // results in error
        echo $array[6]."<br>";
        echo $array[7]."<br>";

    ?>

        
        <h1>This is an <?php # echo 'simple';?> example</h1>
    
    
    </body>

</html>
