<?php

namespace Jaison\TestBundle\Entity;

class Regform	{
	
	protected $fname;
	protected $sname;
	protected $skill;
	protected $exp;
	protected $company;
	
	public function getFname()
    {
        return $this->fname;
    }
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    public function getSname()
    {
        return $this->sname;
    }
    public function setSname($sname)
    {
        $this->sname = $sname;
    }
	
    public function getSkill()
    {
        return $this->skill;
    }
    public function setSkill($skill)
    {
        $this->skill = $skill;
    }
	
	public function getExp()
    {
        return $this->exp;
    }
    public function setExp($exp)
    {
        $this->exp = $exp;
    }
	
	public function getCompany()
    {
        return $this->company;
    }
    public function setCompany($company)
    {
        $this->company = $company;
    }
}

?>