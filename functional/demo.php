<?php
require('utility.php');
echo "enter double \n   ";
$d = Utility::readDouble();
echo $d;
echo "enter float \n";
$f = Utility::readFloat();
echo (float)$f;
$str = "abs";
$str = $str."a";
echo $str;
?>


<?php
include('Dutility.php');
include('LinkedList.php');
$file=fopen("integer2.txt","r");
$integers=fread($file,filesize("integer2.txt"));
$array1=explode(" ",$integers);
$array2=array();
for($i=1;$i<sizeof($array1);$i++)
{
$array2[$i]=new LinkedList();
}
for($i=0;$i<sizeof($array1);$i++)
{
$n=(int)$array1[$i]%11;
$array2[$n]->add((int)$array2[$i]);
}
print_r($array2);
function listarr($array2)
{
$s="";
for($i=0;$i<sizeof($array2);$i++)
{
if($array2[$i]->getdata()!=null)
{
$s.=$array2[$i]->getdata()." ";
}
return substr($s,0,-1)."\n";
}
echo "list is".listarr($arr);
echo "enter the no to search \n";
$num=Dutility::getInt();
$y=(int)$num%11;
if($array2[$y]->search($num))
{
echo "number found \n";
$array2[$y]->delete($num);
}
else
{
echo "number not found \n";
$array2[$y]->add($Num);
echo "added to the list \n";
}
$myfile=fopen("integer2.txt","w");
fwrite($myfile,listarr($array2));
}
?>

