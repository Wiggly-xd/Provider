<?php

include_once 'connect.php';

class Account {
    private $username;
    private $password;
    private $admin;
    private $moderator;
    private $firstName;
    private $middleName;
    private $lastName;
    
    public function __construct($username, $password, $admin, $moderator, $firstName, $middleName, $lastName){
        $this->username = $username;
        $this->password = $password;
        $this->admin = $admin;
        $this->moderator = $moderator;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
    }
    public function get_username() {
        return $this->username;
    }
    public function get_password() {
        return $this->password;
    }
    public function get_admin() {
        return $this->admin;
    }
    public function get_moderator() {
        return $this->moderator;
    }
    public function get_firstName() {
        return $this->firstName;
    }
    public function get_middleName() {
        return $this->middleName;
    }
    public function get_lastName() {
        return $this->lastName;
    }
}
class service {
    private $serviceID;
    private $serviceTitle;
    private $serviceDate;
    
    public function __construct($serviceID, $serviceTitle, $serviceDate){
        $this->serviceID = $serviceID;
        $this->serviceTitle = $serviceTitle;
        $this->serviceDate = $serviceDate;
    }
    public function get_serviceID() {
        return $this->serviceID;
    }
    public function get_serviceTitle() {
        return $this->serviceTitle;
    }
    public function get_serviceDate() {
        return $this->serviceDate;
    }
}
class page {
    private $pageID;
    private $serviceType;
    
    public function __construct($pageID, $serviceType){
        $this->pageID = $pageID;
        $this->serviceType = $serviceType;
    }
    public function get_pageID() {
        return $this->pageID;
    }
    public function get_serviceType() {
        return $this->serviceType;
    }
}
class post {
    private $postID;
    private $pText;
    private $lastUpdate;
    private $postDate;
    private $imageURL;
    private $postTitle;

    public function __construct($postID, $pText, $lastUpdate, $postDate, $postTitle){
        $this->postID = $postID;
        $this->serviceType = $serviceType;
        $this->lastUpdate = $lastupdate;
        $this->postDate = $postDate;
        $this->postTitle = $postTitle;
    }
    public function get_postID() {
        return $this->postID;
    }
    public function get_pText() {
        return $this->pText;
    }
    public function get_lastUpdate() {
        return $this->lastUpdate;
    }
    public function get_postDate() {
        return $this->postDate;
    }
    public function get_postTitle() {
        return $this->postTitle;
    }
}
class image {
    private $postID;
    private $pText;
    private $lastUpdate;
    private $postDate;
    private $postTitle;

    public function __construct($postID, $pText, $lastUpdate, $postDate, $postTitle){
        $this->postID = $postID;
        $this->serviceType = $serviceType;
        $this->lastUpdate = $lastupdate;
        $this->postDate = $postDate;
        $this->postTitle = $postTitle;
    }
    public function get_postID() {
        return $this->postID;
    }
    public function get_pText() {
        return $this->pText;
    }
    public function get_lastUpdate() {
        return $this->lastUpdate;
    }
    public function get_postDate() {
        return $this->postDate;
    }
    public function get_postTitle() {
        return $this->postTitle;
    }
}
?>