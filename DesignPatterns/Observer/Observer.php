<?php
require_once 'Subject.php';
interface Observer{
    function update(Subject $subject);
    function setSubject(Subject $subj);
}


?>