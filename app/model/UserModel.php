<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author jaisonjustus
 */

//namespace model;

class UserModel {

    protected $userId;
    protected $firstName;
    protected $lastName;
    protected $collection;
    protected $address;
    protected $emailId;

    public function UserModel($userId = '', $firstName = '', $lastName = '', $collection = '', $address = '', $emailId = '') {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->collection = $collection;
        $this->address = $address;
        $this->emailId = $emailId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
        return $this;
    }
    
    public function getUserId() {
        return $this->userId;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }
    
    public function getFirstName()  {
        return $this->firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }
    
    public function getLastName()   {
        return $this->lastName;
    }

    public function setCollection($collection) {
        $this->collection = $collection;
        return $this;
    }

    public function getCollection() {
        return $this->collection;
    }
    
    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    public function getAddress()    {
        return $this->address;
    }
    public function setEmailId($emailId) {
        $this->emailId = $emailId;
        return $this;
    }

}

?>
