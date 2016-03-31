<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Infographic
 *
 * @ORM\Table(name="infographic")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\InfographicRepository")
 * @Vich\Uploadable
 */
class Infographic
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="infographic_image", fileNameProperty="infoImage")
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
     * @ORM\Column(name="infoImage", type="string", length=255)
     */
    private $infoImage;

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
     * @return Infographic
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
     * Set infoImage
     *
     * @param string $infoImage
     * @return Infographic
     */
    public function setInfoImage($infoImage)
    {
        $this->infoImage = $infoImage;

        return $this;
    }

    /**
     * Get infoImage
     *
     * @return string 
     */
    public function getInfoImage()
    {
        return $this->infoImage;
    }

    /**
     * Set cityId
     *
     * @param integer $cityId
     * @return Infographic
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
