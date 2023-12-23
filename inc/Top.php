<?php
    //Initial php setup
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    $lang = 'en'; //Default language




    


    //Acepted languages
    $acceptedLangs = array('en', 'it');

    //User language
    if (isset($_COOKIE['lang']))
        $lang = $_COOKIE['lang'];
    else
    {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                
            $browserLang =  strtolower( substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
                
            //Check if the browser language is in the accepted languages
            if (in_array($browserLang, $acceptedLangs))
                $lang = $browserLang;
            else
                $lang = 'en';
        }
        else
            $lang = 'en';

        setcookie('lang', $lang, time() + (86400 * 30), "/");
    }

    
    function getTranslation(&$phrase)
    {
        global $lang;
        
        if (isset($phrase[$lang]))
            return $phrase[$lang];
        else
            return $phrase['en'];
    }
?>