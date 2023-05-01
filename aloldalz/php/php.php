<!DOCTYPE html>
<html>
    <head>
        <title>PHP Scriptek</title>
    </head>
    <body>
        <?php
        $y = 1;
        $fn1 = fn($x) => $x + $y;
        // egyenértékű a következővel:
        $fn2 = function ($x) use ($y) {
        return $x + $y;
        };
        var_export($fn1(3));
        // Output: 4
        ?>
        <?php
        $factor = 10;
        $nums = array_map(fn($n) => $n * $factor, [1, 2, 3, 4]);
        // $nums = array(10, 20, 30, 40);
        ?>
    </body>
</html>