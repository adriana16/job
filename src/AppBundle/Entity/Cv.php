<?php

namespace AppBundle\Entity;

/**
 * Class Cv
 * @package AppBundle\Entity
 */
class Cv
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $education;

    /**
     * @var string
     */
    protected $work;

    /**
     * @var string
     */
    protected $experience;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return Cv
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     * @return Cv
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * @param $education
     * @return Cv
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * @return string
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * @param $work
     * @return Cv
     */
    public function setWork($work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * @return string
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param $experience
     * @return Cv
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }
}
