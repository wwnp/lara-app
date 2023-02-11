<?php
class Human
{
    protected string $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class HumanWithHomeland  extends Human
{
    protected ?string $homeland;
    public function __construct(string $name, string $homeland)
    {
        parent::__construct($name);
        $this->homeland = $homeland;
    }
}
class HumanWithoutHomeland extends Human
{
}

$me = new HumanWithoutHomeland("Serge");
echo '<pre style="border: 1px solid #000; height: auto; overflow: auto; margin: 0.5em;">';
echo " me <hr />";
print_r($me);
echo '</pre>';
echo '<hr>';
$you = new HumanWithHomeland("Jane", "USA");
echo '<pre style="border: 1px solid #000; height: auto; overflow: auto; margin: 0.5em;">';
echo " you <hr />";
print_r($you);
echo '</pre>';
echo '<hr>';
