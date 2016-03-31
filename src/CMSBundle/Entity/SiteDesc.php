<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * SiteDesc
 *
 * @ORM\Table(name="site_desc")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\SiteDescRepository")
 */
class SiteDesc
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
     * @ORM\Column(name="site_desc_title", type="string", length=30)
     */
    private $siteDescTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="site_desc_content", type="text")
     */
    private $siteDescContent;

    /**
     * @var string
     *
     * @ORM\Column(name="site_desc_title_ar", type="string", length=30)
     */
    private $siteDescTitleAr;

    /**
     * @var string
     *
     * @ORM\Column(name="site_desc_content_ar", type="text")
     */
    private $siteDescContentAr;

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
     * Set siteDescContent
     *
     * @param string $siteDescContent
     * @return SiteDesc
     */
    public function setSiteDescContent($siteDescContent)
    {
        $this->siteDescContent = $siteDescContent;

        return $this;
    }

    /**
     * Get siteDescContent
     *
     * @return string
     */
    public function getSiteDescContent()
    {
        return $this->siteDescContent;
    }

    /**
     * Set siteDescTitle
     *
     * @param string $siteDescTitle
     * @return SiteDesc
     */
    public function setSiteDescTitle($siteDescTitle)
    {
        $this->siteDescTitle = $siteDescTitle;

        return $this;
    }

    /**
     * Get siteDescTitle
     *
     * @return string
     */
    public function getSiteDescTitle()
    {
        return $this->siteDescTitle;
    }
    /**
     * Set siteDescContentAr
     *
     * @param string $siteDescContentAr
     * @return SiteDesc
     */
    public function setSiteDescContentAr($siteDescContentAr)
    {
        $this->siteDescContentAr = $siteDescContentAr;

        return $this;
    }

    /**
     * Get siteDescContentAr
     *
     * @return string
     */
    public function getSiteDescContentAr()
    {
        return $this->siteDescContentAr;
    }

    /**
     * Set siteDescTitleAr
     *
     * @param string $siteDescTitleAr
     * @return SiteDesc
     */
    public function setSiteDescTitleAr($siteDescTitleAr)
    {
        $this->siteDescTitleAr = $siteDescTitleAr;

        return $this;
    }

    /**
     * Get siteDescTitleAr
     *
     * @return string
     */
    public function getSiteDescTitleAr()
    {
        return $this->siteDescTitleAr;
    }
}
