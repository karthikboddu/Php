<?php
class shareFacade {
  // Holds a reference to all of the classes.
  protected $twitter;    
  protected $google;   
  protected $reddit;    
    
  /**
   * The objects are injected to the constructor.   
   */
  function __construct($twitterObj,$gooleObj,$redditObj)
  {
    $this->twitter = $twitterObj;
    $this->google  = $gooleObj;
    $this->reddit  = $redditObj;
  }  
        
  /**
   * One function makes all the job of calling all the share methods that belong to all the social networks.
   */
  function share($url,$title,$status)
  {
    $this->twitter->tweet($status, $url);
    $this->google->share($url);
    $this->reddit->reddit($url, $title);
  }
}

class CodeTwit {
    function tweet($status, $url)
    {
      echo "Tweeted:".$status." from:".$url;
    }
  }
  
  /**
   *  Class to share on Google plus.
   */
  class Googlize {
    function share($url)
    {
      echo "\nShared on Google plus:".$url;
    }
  }
  
  /**
   * Class to share in Reddit.
   */
  class Reddiator {
    function reddit($url, $title)
    {
      echo "\nReddit! url:".$url." title:".$title;
    }
  }
  

/**
 *  Create the objects from the classes.
 */
$twitterObj = new CodeTwit();
$gooleObj   = new Googlize();
$redditObj  = new Reddiator();

// Pass the objects to the class facade object.
$shareObj = new shareFacade($twitterObj,$gooleObj,$redditObj);

// Call only 1 method to share your post with all the social networks.
$shareObj->share('url --','title -- ','status --');

?>