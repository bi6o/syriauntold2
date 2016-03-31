<?php

namespace CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 *
 * @ORM\Table(name="language")
 * @ORM\Entity(repositoryClass="CMSBundle\Repository\LanguageRepository")
 */
class Language
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
     * @ORM\Column(name="fieldName", type="string", length=64, unique=true)
     */
    private $fieldName;

    /**
     * @var string
     *
     * @ORM\Column(name="langEn", type="string", length=64)
     */
    private $langEn;

    /**
     * @var string
     *
     * @ORM\Column(name="langAr", type="string", length=64)
     */
    private $langAr;


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
     * Set fieldName
     *
     * @param string $fieldName
     * @return Language
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * Get fieldName
     *
     * @return string 
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * Set langEn
     *
     * @param string $langEn
     * @return Language
     */
    public function setLangEn($langEn)
    {
        $this->langEn = $langEn;

        return $this;
    }

    /**
     * Get langEn
     *
     * @return string 
     */
    public function getLangEn()
    {
        return $this->langEn;
    }

    /**
     * Set langAr
     *
     * @param string $langAr
     * @return Language
     */
    public function setLangAr($langAr)
    {
        $this->langAr = $langAr;

        return $this;
    }

    /**
     * Get langAr
     *
     * @return string 
     */
    public function getLangAr()
    {
        return $this->langAr;
    }
}
