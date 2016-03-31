<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\ArticleRepository")
 * @Vich\Uploadable
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    // ..... other fields

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="article_image", fileNameProperty="articleImage")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;
    /**
     * @var string
     *
     * @ORM\Column(name="articleTitle", type="string", length=30)
     */
    private $articleTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="articleTitleAr", type="string", length=30)
     */
    private $articleTitleAr;

    /**
     * @var string
     *
     * @ORM\Column(name="articleDesc", type="text")
     */
    private $articleDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="articleDescAr", type="text")
     */
    private $articleDescAr;

    /**
     * @var string
     *
     * @ORM\Column(name="articleImage", type="string", length=255)
     */
    private $articleImage;

    /**
     * @var string
     *
     * @ORM\Column(name="articleLink", type="string", length=255)
     */
    private $articleLink;

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
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Article
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
    /**
     * Set articleTitle
     *
     * @param string $articleTitle
     * @return Article
     */
    public function setArticleTitle($articleTitle)
    {
        $this->articleTitle = $articleTitle;

        return $this;
    }

    /**
     * Get articleTitle
     *
     * @return string 
     */
    public function getArticleTitle()
    {
        return $this->articleTitle;
    }

    /**
     * Set articleTitleAr
     *
     * @param string $articleTitleAr
     * @return Article
     */
    public function setArticleTitleAr($articleTitleAr)
    {
        $this->articleTitleAr = $articleTitleAr;

        return $this;
    }

    /**
     * Get articleTitleAr
     *
     * @return string 
     */
    public function getArticleTitleAr()
    {
        return $this->articleTitleAr;
    }

    /**
     * Set articleDesc
     *
     * @param string $articleDesc
     * @return Article
     */
    public function setArticleDesc($articleDesc)
    {
        $this->articleDesc = $articleDesc;

        return $this;
    }

    /**
     * Get articleDesc
     *
     * @return string 
     */
    public function getArticleDesc()
    {
        return $this->articleDesc;
    }

    /**
     * Set articleDescAr
     *
     * @param string $articleDescAr
     * @return Article
     */
    public function setArticleDescAr($articleDescAr)
    {
        $this->articleDescAr = $articleDescAr;

        return $this;
    }

    /**
     * Get articleDescAr
     *
     * @return string 
     */
    public function getArticleDescAr()
    {
        return $this->articleDescAr;
    }

    /**
     * Set articleImage
     *
     * @param string $articleImage
     * @return Article
     */
    public function setArticleImage($articleImage)
    {
        $this->articleImage = $articleImage;

        return $this;
    }

    /**
     * Get articleImage
     *
     * @return string 
     */
    public function getArticleImage()
    {
        return $this->articleImage;
    }

    /**
     * Set articleLink
     *
     * @param string $articleLink
     * @return Article
     */
    public function setArticleLink($articleLink)
    {
        $this->articleLink = $articleLink;

        return $this;
    }

    /**
     * Get articleLink
     *
     * @return string 
     */
    public function getArticleLink()
    {
        return $this->articleLink;
    }

    /**
     * Set cityId
     *
     * @param integer $cityId
     * @return Article
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
