<?php
interface Observer{
    function update();
    function setSubject(Subject $subj);
}


?>