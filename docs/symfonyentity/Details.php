<?php

namespace Jaison\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
* @ORM\ Entity
* @ORM\ Table(name="details")
*/
class Details	{
	
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
	* @ORM\ Column(type="string", length=50)
	*/
	protected $fname;
	
	/**
	* @ORM\ Column(type="string", length=50)
	*/
	protected $lname;
	
	/**
	* @ORM\ Column(type="string", length=20)
	*/
	protected $skill;
	
	/**
	* @ORM\ Column(type="integer")
	*/
	protected $exp;
	
	/**
	* @ORM\ Column(type="string", length=100)
	*/
	protected $company;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fname
     *
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * Get fname
     *
     * @return string 
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set lname
     *
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * Get lname
     *
     * @return string 
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set skill
     *
     * @param string $skill
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
    }

    /**
     * Get skill
     *
     * @return string 
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set exp
     *
     * @param integer $exp
     */
    public function setExp($exp)
    {
        $this->exp = $exp;
    }

    /**
     * Get exp
     *
     * @return integer 
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * Set company
     *
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }
}