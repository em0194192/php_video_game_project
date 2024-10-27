<?php

    //create some variables to hold
    $dsn = "mysql:host=localhost;dbname=videogameapp";
    $username = "root";
    $password = "";

    //Connect to the database (try catch gives error or confirmation)
    //Note that PDO (php data object) is a class (with methods/properties)
    try {
        $db = new PDO($dsn, $username, $password);
        //echo("Connected to database");
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo("Error connecting to database: $error_message");
        exit();
    }

function checkLogin($username, $password)
{
    if (!$username || !$password)
    {
        // anything passed was null, return false
        return false;
    }

    //load the data from users.csv
    $filename = "../model/users.csv"; //designate the location as a string
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
    $filename = "../model/games.csv"; //designate the location as a string
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

function getGamesDB()
{
    //declare global to have access to variable
    global $db;
    //string variable for the query
    $qry = "Select * from games";
    $pdoStatement = $db->query($qry);
    //use a fetchall method from pdostatement to fetch all games
    $games = $pdoStatement->fetchAll();
    
    //print_r($games);
    
    return $games;

}

function addGameDB($title, $genre, $platform, $image)
{
    //check for empty values, return false if any
    if (!$title || !$genre || !$platform || !$image)
    {
        return false;
    }

    //check the file upload for errors, return false if any
    if ($image['error'] !== 0)
    {
        return false;
    }

    //Uploaded the File, move it
    //Set the directories for move
    $temp = $image['tmp_name'];
    $path = '../uploads/' . basename($image['name']);
    
    //move file, save outcome bool to variable
    $moved = move_uploaded_file($temp, $path);

    if($moved)
    {
        global $db;
        $query = "INSERT INTO `games` (`gameID`, `gameTitle`, `gameGenre`, `gamePlatform`, `gameImgLink`) VALUES (NULL, '$title', '$genre', '$platform', '$path'); ";
        $db->query($query);
        return true;
    } else {
        return false;
    }
    


}