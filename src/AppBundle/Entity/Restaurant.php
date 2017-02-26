<?php
/**
 * Created by PhpStorm.
 * User: stijnblommerde
 * Date: 24/02/17
 * Time: 11:58
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Restaurant
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="restaurants")
 */
class Restaurant
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Regex("/^\d+$/", match=false, message="Name cannot be a number")
     * @Assert\Length(min="3", minMessage="Name is at least 3 characters long")
     */
    protected $name;

    /**
     * @OneToMany(
     *     targetEntity="AppBundle\Entity\MenuItem",
     *     mappedBy="restaurant",
     *     orphanRemoval=true)
     */
    protected $menuItems;

    public function __construct() {
        $this->menuItems = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMenuItems()
    {
        return $this->menuItems;
    }

    /**
     * @param mixed $menuItems
     */
    public function setMenuItems($menuItems)
    {
        $this->menuItems = $menuItems;
    }

}