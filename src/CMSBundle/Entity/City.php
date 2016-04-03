<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\CityRepository")
 * @Vich\Uploadable
 */
class City
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
     * @Vich\UploadableField(mapping="citypdf", fileNameProperty="pdfUrl")
     *
     * @var File
     */
    private $pdfFile;

    /**
     * @var string
     *
     * @ORM\Column(name="pdfUrl", type="string", length=255)
     */
    private $pdfUrl;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="city_desc", type="text")
     */
    private $cityDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="city_desc_ar", type="text")
     */
    private $cityDescAr;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=30)
     */
    private $publisher;

    /**
     * @var string
     *
     * @ORM\Column(name="translator", type="string", length=30)
     */
    private $translator;

    /**
     * @var string
     *
     * @ORM\Column(name="supervisor", type="string", length=30)
     */
    private $supervisor;

    /**
     * @var string
     *
     * @ORM\Column(name="special_thanks", type="text")
     */
    private $specialThanks;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher_ar", type="string", length=30)
     */
    private $publisherAr;

    /**
     * @var string
     *
     * @ORM\Column(name="translator_ar", type="string", length=30)
     */
    private $translatorAr;

    /**
     * @var string
     *
     * @ORM\Column(name="supervisor_ar", type="string", length=30)
     */
    private $supervisorAr;

    /**
     * @var string
     *
     * @ORM\Column(name="special_thanks_ar", type="text")
     */
    private $specialThanksAr;


    /**
     * @var string
     *
     * @ORM\Column(name="name_ar", type="string", length=30)
     */
    private $nameAr;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setPdfFile(File $pdf = null)
    {
        $this->pdfFile = $pdf;

        if ($pdf) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getPdfFile()
    {
        return $this->pdfFile;
    }

    /**
     * Set pdfUrl
     *
     * @param string $pdfUrl
     * @return City
     */
    public function setPdfUrl($pdfUrl)
    {
        $this->pdfUrl = $pdfUrl;

        return $this;
    }

    /**
     * Get pdfUrl
     *
     * @return string
     */
    public function getPdfUrl()
    {
        return $this->pdfUrl;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nameAr
     *
     * @param string $name
     * @return City
     */
    public function setNameAr($nameAr)
    {
        $this->nameAr = $nameAr;

        return $this;
    }

    /**
     * Get nameAr
     *
     * @return string
     */
    public function getNameAr()
    {
        return $this->nameAr;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return City
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }



    /**
     * Set cityDesc
     *
     * @param string $cityDesc
     * @return City
     */
    public function setCityDesc($cityDesc)
    {
        $this->cityDesc = $cityDesc;

        return $this;
    }

    /**
     * Get cityDesc
     *
     * @return string 
     */
    public function getCityDesc()
    {
        return $this->cityDesc;
    }

    /**
     * Set cityDescAr
     *
     * @param string $cityDescAr
     * @return City
     */
    public function setCityDescAr($cityDescAr)
    {
        $this->cityDescAr = $cityDescAr;

        return $this;
    }

    /**
     * Get cityDescAr
     *
     * @return string 
     */
    public function getCityDescAr()
    {
        return $this->cityDescAr;
    }

    /**
     * Set publisher
     *
     * @param string $publisher
     * @return City
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string 
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set translator
     *
     * @param string $translator
     * @return City
     */
    public function setTranslator($translator)
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * Get translator
     *
     * @return string 
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Set supervisor
     *
     * @param string $supervisor
     * @return City
     */
    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    /**
     * Get supervisor
     *
     * @return string 
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * Set specialThanks
     *
     * @param string $specialThanks
     * @return City
     */
    public function setSpecialThanks($specialThanks)
    {
        $this->specialThanks = $specialThanks;

        return $this;
    }

    /**
     * Get specialThanks
     *
     * @return string 
     */
    public function getSpecialThanks()
    {
        return $this->specialThanks;
    }

    /**
     * Set publisherAr
     *
     * @param string $publisherAr
     * @return City
     */
    public function setPublisherAr($publisherAr)
    {
        $this->publisherAr = $publisherAr;

        return $this;
    }

    /**
     * Get publisherAr
     *
     * @return string 
     */
    public function getPublisherAr()
    {
        return $this->publisherAr;
    }

    /**
     * Set translatorAr
     *
     * @param string $translatorAr
     * @return City
     */
    public function setTranslatorAr($translatorAr)
    {
        $this->translatorAr = $translatorAr;

        return $this;
    }

    /**
     * Get translatorAr
     *
     * @return string 
     */
    public function getTranslatorAr()
    {
        return $this->translatorAr;
    }

    /**
     * Set supervisorAr
     *
     * @param string $supervisorAr
     * @return City
     */
    public function setSupervisorAr($supervisorAr)
    {
        $this->supervisorAr = $supervisorAr;

        return $this;
    }

    /**
     * Get supervisorAr
     *
     * @return string 
     */
    public function getSupervisorAr()
    {
        return $this->supervisorAr;
    }

    /**
     * Set specialThanksAr
     *
     * @param string $specialThanksAr
     * @return City
     */
    public function setSpecialThanksAr($specialThanksAr)
    {
        $this->specialThanksAr = $specialThanksAr;

        return $this;
    }

    /**
     * Get specialThanksAr
     *
     * @return string 
     */
    public function getSpecialThanksAr()
    {
        return $this->specialThanksAr;
    }
}
