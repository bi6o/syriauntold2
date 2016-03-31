<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Audio
 *
 * @ORM\Table(name="audio")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\AudioRepository")
 */
class Audio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="audioLink", type="string", length=255)
     */
    private $audioLink;

    /**
     * @var int
     *
     * @ORM\Column(name="cityId", type="integer")
     */
    private $cityId;


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
     * Set audioLink
     *
     * @param string $audioLink
     * @return Audio
     */
    public function setAudioLink($audioLink)
    {
        $this->audioLink = $audioLink;

        return $this;
    }

    /**
     * Get audioLink
     *
     * @return string 
     */
    public function getAudioLink()
    {
        return $this->audioLink;
    }

    /**
     * Set cityId
     *
     * @param integer $cityId
     * @return Audio
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * Get cityId
     *
     * @return integer 
     */
    public function getCityId()
    {
        return $this->cityId;
    }
}
