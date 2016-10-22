<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    public $id;

    /**
     * @ORM\Column(name="name", type="string")
     *
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Post", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id", onDelete="CASCADE")
     *
     * @Assert\Valid()
     */
    public $post;
}
