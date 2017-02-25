<?php
/**
 * Created by PhpStorm.
 * User: stijnblommerde
 * Date: 24/02/17
 * Time: 11:58
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Regex("/^\d+$/", match=false, message="Name cannot be a number")
     * @Assert\Length(min="3", minMessage="Name is at least 3 characters long")
     */
    protected $name;

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

}