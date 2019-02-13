<?php
class App
{
    private $proxy;
 
    public function __construct(Proxy $proxy)
    {
        echo "App::__construct\n";
        $this->proxy = $proxy;
    }
 
    public function hello()
    {
        return $this->proxy->hello();
    }
}
 
class Proxy
{
    private $curl;
 
    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }
 
    public function hello()
    {
        echo "Proxy::__construct\n";
        return $this->curl->doGet();
    }
}
 
class Curl
{
    public function doGet()
    {
        echo "Curl::doGet\n";
        return "Hello";
    }
}
 
 
$app = new App(new Proxy(new Curl()));
echo $app->hello();