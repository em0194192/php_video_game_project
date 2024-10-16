<?php

function checkLogin($username, $password)
{
    if (!$username || !$password)
    {
        // anything passed was null, return false
        return false;
    }

    //load the data from users.csv
    $filename = "model/users.csv"; //designate the location as a string
    $file = fopen($filename, "rb"); //open the stream for reading
    if (!$file)
    {
        return false; //the file didn't open
    }
    $accounts = array(); //initialize an array to hold elements

    //iterate through to end of file 
    while(!feof($file)){
        //read a line from csv file and parse as a csv
        $account = fgetcsv($file); 
        
        //if at end of file, forces to next iteration - will check feof condition and terminate loop
        if($account === false){ 
            continue;
        }

        //add the account to the accounts array
        $accounts[] = $account;
    }

    //close the file
    fclose($file);
    
    //look for username/password pair in array
    foreach($accounts as $account)
    {       
        if($account[0] === $username && $account[1] === $password)
        {
            return true;
        } 
    }
    
    //Return false if went through array and did not find
    return false;
}

function getGames()
{
    //load the data from games.csv
    $filename = "model/games.csv"; //designate the location as a string
    $file = fopen($filename, "rb"); //open the stream for reading
    if (!$file)
    {
        return false; //the file didn't open
    }
    $games = array(); //initialize an array to hold elements

    //iterate through to end of file 
    while(!feof($file)){
        //read a line from csv file and parse as a csv
        $game = fgetcsv($file); 
            
        //if at end of file, forces to next iteration - will check feof condition and terminate loop
        if($game === false){ 
            continue;
        }

        //add the game to the games array
        $games[] = $game;
    }

    //close the file
    fclose($file);

    //return the array
    return $games;
}