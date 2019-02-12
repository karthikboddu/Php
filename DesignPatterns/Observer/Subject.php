<?php
require_once ('Observer.php');
interface Subject{
    function register(Observer $observ);
    function unregister(Observer $observ);
    function notifyObservers();
    function getUpdate();
}

?>