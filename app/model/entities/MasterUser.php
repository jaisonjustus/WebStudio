<?php

/**
 * @Entity
 * @Table(name="tbl_master_user")
 */
class MasterUser {
    
    /**
     * @Id @Column(name="id", type="integer")
     * @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(name="email", length="100")
     */
    private $email;
    
    /**
     * @Column(name="username", length="100")
     */
    private $username;
    
    /**
     * @Column(name="password", length="100")
     */
    private $password;
    
    
    public function setEmail($value)  {
        $this->email = $value;
    }
    
    public function setUserName($value) {
        $this->username = $value;
    }
    
    public function setPassWord($value) {
        $this->password = $value;
    }
    
    public function getEmail()  {
        return $this->email;
    }
}

?>
