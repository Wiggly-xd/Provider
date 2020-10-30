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
    private $serviceID;
    
    public function __construct($pageID, $serviceType, $serviceID){
        $this->pageID = $pageID;
        $this->serviceType = $serviceType;
        $this->serviceID = $serviceID;
    }
    public function get_pageID() {
        return $this->pageID;
    }
    public function get_serviceType() {
        return $this->serviceType;
    }
    public function get_serviceID() {
        return $this->serviceID;
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
    private $imageID;
    private $name;
    private $path;
    private $type;
    private $postID;

    public function __construct($imageID, $name, $path, $type, $postID){
        $this->imageID = $imageID;
        $this->name = $name;
        $this->path = $path;
        $this->type = $type;
        $this->postID = $postId;
    }

    public function get_imageID() {
        return $this->imageID;
    }
    public function get_name() {
        return $this->name;
    }
    public function get_path() {
        return $this->path;
    }
    public function get_type() {
        return $this->type;
    }
    public function get_postID() {
        return $this->postID;
    }
}
class version {
    private $historyID;
    private $historyDate;
    private $historyText;
    private $historyImage;
    private $postID;

    public function __construct($historyID, $historyDate, $historyText, $historyImage, $postID){
        $this->historyID = $historyID;
        $this->historyDate = $historyDate;
        $this->historyText = $historyText;
        $this->historyImage = $historyImage;
        $this->postID = $postID;
    }

    public function get_historyID() {
        return $this->historyID;
    }
    public function get_historyDate() {
        return $this->historyDate;
    }
    public function get_historyText() {
        return $this->historyText;
    }
    public function get_historyImage() {
        return $this->historyImage;
    }
    public function get_postID() {
        return $this->postID;
    }
}
class comment {
    private $commentID;
    private $cText;
    private $cDate;
    private $pageID;

    public function __construct($historyID, $cText, $cDate, $pageID){
        $this->commentID = $commentID;
        $this->cText = $cText;
        $this->cDate = $cDate;
        $this->pageID = $pageID;
    }

    public function get_commentID() {
        return $this->commentID;
    }
    public function get_cText() {
        return $this->cText;
    }
    public function get_cDate() {
        return $this->cDate;
    }
    public function get_pageID() {
        return $this->pageID;
    }
}
class privilege {
    private $userID;
    private $admin;
    private $moderator;

    public function __construct($userID, $admin, $moderator){
        $this->userID = $userID;
        $this->admin = $admin;
        $this->moderator = $moderator;
    }

    public function get_userID() {
        return $this->userID;
    }
    public function get_admin() {
        return $this->admin;
    }
    public function get_moderator() {
        return $this->moderator;
    }
}
class event {
    private $eventID;
    private $eventTitle;
    private $description;
    private $startDate;
    private $endDate;
    
    public function __construct($eventID, $eventTitle, $description, $startDate, $endDate){
        $this->eventID = $eventID;
        $this->eventTitle = $eventTitle;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function get_eventID() {
        return $this->eventID;
    }
    public function get_eventTitle() {
        return $this->eventTitle;
    }
    public function get_description() {
        return $this->description;
    }
    public function get_startDate() {
        return $this->startDate;
    }
    public function get_endDate() {
        return $this->endDate;
    }
}
?>