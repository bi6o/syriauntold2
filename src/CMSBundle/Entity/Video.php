<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\VideoRepository")
 */
class Video
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
     * @ORM\Column(name="videoTitle", type="string", length=30)
     */
    private $videoTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="videoTitleAr", type="string", length=30)
     */
    private $videoTitleAr;

    /**
     * @var string
     *
     * @ORM\Column(name="videoDesc", type="text")
     */
    private $videoDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="videoDescAr", type="text")
     */
    private $videoDescAr;

    /**
     * @var string
     *
     * @ORM\Column(name="videoDirector", type="string", length=30)
     */
    private $videoDirector;

    /**
     * @var string
     *
     * @ORM\Column(name="videoDirectorAr", type="string", length=30)
     */
    private $videoDirectorAr;

    /**
     * @var string
     *
     * @ORM\Column(name="videoLink", type="string", length=255)
     */
    private $videoLink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="videoDate", type="date")
     */
    private $videoDate;

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
     * Set videoTitle
     *
     * @param string $videoTitle
     * @return Video
     */
    public function setVideoTitle($videoTitle)
    {
        $this->videoTitle = $videoTitle;

        return $this;
    }

    /**
     * Get videoTitle
     *
     * @return string 
     */
    public function getVideoTitle()
    {
        return $this->videoTitle;
    }

    /**
     * Set videoTitleAr
     *
     * @param string $videoTitleAr
     * @return Video
     */
    public function setVideoTitleAr($videoTitleAr)
    {
        $this->videoTitleAr = $videoTitleAr;

        return $this;
    }

    /**
     * Get videoTitleAr
     *
     * @return string 
     */
    public function getVideoTitleAr()
    {
        return $this->videoTitleAr;
    }

    /**
     * Set videoDesc
     *
     * @param string $videoDesc
     * @return Video
     */
    public function setVideoDesc($videoDesc)
    {
        $this->videoDesc = $videoDesc;

        return $this;
    }

    /**
     * Get videoDesc
     *
     * @return string 
     */
    public function getVideoDesc()
    {
        return $this->videoDesc;
    }

    /**
     * Set videoDescAr
     *
     * @param string $videoDescAr
     * @return Video
     */
    public function setVideoDescAr($videoDescAr)
    {
        $this->videoDescAr = $videoDescAr;

        return $this;
    }

    /**
     * Get videoDescAr
     *
     * @return string 
     */
    public function getVideoDescAr()
    {
        return $this->videoDescAr;
    }

    /**
     * Set videoDirector
     *
     * @param string $videoDirector
     * @return Video
     */
    public function setVideoDirector($videoDirector)
    {
        $this->videoDirector = $videoDirector;

        return $this;
    }

    /**
     * Get videoDirector
     *
     * @return string 
     */
    public function getVideoDirector()
    {
        return $this->videoDirector;
    }

    /**
     * Set videoDirectorAr
     *
     * @param string $videoDirectorAr
     * @return Video
     */
    public function setVideoDirectorAr($videoDirectorAr)
    {
        $this->videoDirectorAr = $videoDirectorAr;

        return $this;
    }

    /**
     * Get videoDirectorAr
     *
     * @return string 
     */
    public function getVideoDirectorAr()
    {
        return $this->videoDirectorAr;
    }

    /**
     * Set videoLink
     *
     * @param string $videoLink
     * @return Video
     */
    public function setVideoLink($videoLink)
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    /**
     * Get videoLink
     *
     * @return string 
     */
    public function getVideoLink()
    {
        return $this->videoLink;
    }

    /**
     * Set videoDate
     *
     * @param \DateTime $videoDate
     * @return Video
     */
    public function setVideoDate($videoDate)
    {
        $this->videoDate = $videoDate;

        return $this;
    }

    /**
     * Get videoDate
     *
     * @return \DateTime 
     */
    public function getVideoDate()
    {
        return $this->videoDate;
    }

    /**
     * Set cityId
     *
     * @param integer $cityId
     * @return Video
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
