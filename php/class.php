<?php
//inkluderar anslutningen till databasen
include_once 'connect.php';

//skapar klassen teams
class teams{

//initierar variablar i funktion
private $division;
private $team;
private $teamid;

public function __construct($division, $team, $teamid){
    $this->division = $division;
    $this->team = $team;
    $this->teamid = $teamid;

}

//skapar getters
public function get_division() {
    return $this->division;
}

public function get_team() {
    return $this->team;
}

public function get_teamid() {
    return $this->teamid;
}

}

//skapar klassen players
class players{
//initierar variablar i funktion
    private $playername;
    private $division;
    private $teamid;
    
    public function __construct($playername, $teamid){
        $this->playername = $playername;
        $this->teamid = $teamid;
    
    }
//skapar getters
    public function get_playername() {
        return $this->playername;
    }
    
    public function get_teamid() {
        return $this->teamid;
    }
    
    }

//skapar klassen goal
    class goal{
//initierar variablar i funktion
        private $playerid;
        private $playername;
        private $goals;
        private $gameid;
        
        public function __construct($playerid, $playername, $goals, $gameid){
            $this->playerid = $playerid;
            $this->playername = $playername;
            $this->goals= $goals;
            $this->gameid = $gameid;
        
        }
//skapar getters
        public function get_playerid() {
            return $this->playerid;
        }

        public function get_playername() {
            return $this->playername;
        }

        public function get_goals() {
            return $this->goals;
        }

        public function get_gameid() {
            return $this->gameid;
        }
        
        }
//skapar klassen game
    class game{
//initierar variablar i funktion
        private $teamid;
        private $team;
        private $goals;
        private $gameid;
        private $date;
        private $audience;
        private $position;
        private $letin;
        private $starttime;
        private $division;
        
        public function __construct($goals, $teamid, $team, $gameid, $letin, $audience, $position, $date, $starttime, $division){
            $this->division = $division;
            $this->teamid = $teamid;
            $this->team = $team;
            $this->gameid = $gameid;
            $this->goals = $goals;
            $this->date = $date;
            $this->audience = $audience;
            $this->position = $position;
            $this->letin = $letin;
            $this->starttime = $starttime;
        
        }
        
//skapar getters
        public function get_teamid() {
            return $this->teamid;
        }

        public function get_team() {
            return $this->team;
        }
        
        public function get_goals() {
            return $this->goals;
        }

        public function get_gameid() {
            return $this->gameid;
        }
    
        public function get_date() {
            return $this->date;
        }
        
        public function get_audience() {
            return $this->audience;
        }

        public function get_position() {
            return $this->position;
        }

        public function get_letin() {
            return $this->letin;
        }

        public function get_starttime() {
            return $this->starttime;
        }

        public function get_division() {
            return $this->division;
        }
        
    }
?>