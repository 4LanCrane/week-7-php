<?php
// Define an abstract class Converter that has a single abstract method convert(), which takes as a parameter a value to convert.
// 4. Define a class C2FConverter, which extends the class Converter and implements the method convert() to convert degree Celsius to degree Fahrenheit.
// 5. Define a class F2CConverter, which extends the class Converter and implements the method convert() to convert degree Fahrenheit to degree Celsius.


abstract class Converter
{
    abstract protected function convert($value);
}

class F2CConverter extends Converter
{
    public function convert($value)
    {
        return ($value - 32) * 5 / 9;
    }
}


class C2FConverter extends Converter
{
    public function convert($value)
    {
        return $value * 9 / 5 + 32;
    }
}


$c2f = new C2FConverter();
$f = $c2f->convert(27);


$f2c = new F2CConverter();
$c = number_format($f2c->convert(27), 2);


// 6. Define a class EUR2GBPConverter, which extends the class Converter and implements the method convert() to convert EUR to GBP. - The class should have a constructor, which takes an exchange rate as a parameter. Use an appropriate modifier for the member variable storing the conversion rate value. - The class should have a public method to get the exchange rate (read-only) - The class should deduct a flat fee of 0.5 GBP from the converted amount. Use an appropriate modifier for the member variable storing the fee value. - The class should have a public method to get the flat fee (read-only)
// 7. Write PHP code to convert the values indicated in HTML code and insert the results at the correct position.

class EUR2GBPConverter extends Converter
{
    private $rate = 1;
    static private $fee = 0.5;



    public function __construct(
        $rate
    ) {
        $this->rate = $rate;
    }


    public function fee()
    {
        return self::$fee;
    }

    public function rate()
    {
        return $this->rate;
    }


    public function convert($value)
    {
        return ($value * $this->rate) - self::$fee;
    }
}

$e2p = new EUR2GBPConverter(0.85);
$p = $e2p->convert(999);



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP introduction (3)</title>
</head>

<body>
    <p>27 &deg; C =
        <?php echo $f ?> &deg; F
    </p>
    <p>27 &deg; F =
        <?php echo $c ?> &deg; C
    </p>
    <p>999 EUR =
        <?php echo $p ?> GBP
    </p>
    <p>(exchange rate =
        <?php echo $e2p->rate() ?>, flat fee =
        <?php echo $e2p->fee() ?> GBP)
    </p>
</body>

</html>