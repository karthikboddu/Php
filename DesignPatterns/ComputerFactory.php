<?php
/**
 * overview  : Use Factory Pattern to create a Computer Factory that can Produce PC, Laptop
 *               and Server Class Computers. As Shown in the Figure Below Create an Abstract Computer Class and PC, Laptop and Server inherit from Computer and ComputerFactory is able to create the corresponding Computer Object on request
 * purpose   : ComputerFactory is able to create the corresponding Computer Object on request
 * @author   : karthik
 * @version  : 1.0
 * @since    : 07-02-2019
 ***********************************************************************************/
require '../ObjectOrientedPrograms/utility.php';
require 'Computer.php';
class ComputerFactory
{
    public function __construct($name, $specs)
    {
        $this->dname = $name;
        $this->dspecs = $specs;
    }
}
function computerObj($name)
{
    try {
        if (class_exists($name)) {
            return new $name();
        } else {
            throw new Exception("invalid class\n");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function printDetails($name, $specs)
{
    $obj = new ComputerFactory($name, $specs);
    echo "\n\t" . $obj->dname . " specs are \n";
    echo "\t".$obj->dname . "\n";
    echo "\t".$obj->dspecs . "\n";
}

echo "enter the class name \n";
$name = Oops::readString();
computerObj($name);

?>
