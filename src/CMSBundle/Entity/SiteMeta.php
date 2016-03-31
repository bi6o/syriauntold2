<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteMeta
 *
 * @ORM\Table(name="site_meta")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\SiteMetaRepository")
 */
class SiteMeta
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
     * @ORM\Column(name="SiteDescription", type="text")
     */
    private $siteDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="SiteKeywords", type="text")
     */
    private $siteKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="SiteAuthor", type="string", length=30)
     */
    private $siteAuthor;


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
     * Set siteDescription
     *
     * @param string $siteDescription
     * @return SiteMeta
     */
    public function setSiteDescription($siteDescription)
    {
        $this->siteDescription = $siteDescription;

        return $this;
    }

    /**
     * Get siteDescription
     *
     * @return string 
     */
    public function getSiteDescription()
    {
        return $this->siteDescription;
    }

    /**
     * Set siteKeywords
     *
     * @param string $siteKeywords
     * @return SiteMeta
     */
    public function setSiteKeywords($siteKeywords)
    {
        $this->siteKeywords = $siteKeywords;

        return $this;
    }

    /**
     * Get siteKeywords
     *
     * @return string 
     */
    public function getSiteKeywords()
    {
        return $this->siteKeywords;
    }

    /**
     * Set siteAuthor
     *
     * @param string $siteAuthor
     * @return SiteMeta
     */
    public function setSiteAuthor($siteAuthor)
    {
        $this->siteAuthor = $siteAuthor;

        return $this;
    }

    /**
     * Get siteAuthor
     *
     * @return string 
     */
    public function getSiteAuthor()
    {
        return $this->siteAuthor;
    }
}
