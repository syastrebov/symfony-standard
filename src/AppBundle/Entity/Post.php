<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="posts")
 *
 * @Assert\GroupSequenceProvider()
 */
class Post implements GroupSequenceProviderInterface
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    public $id;

    /**
     * @ORM\Column(name="content", type="string")
     *
     * @Assert\NotBlank(groups={"MyGroup"})
     */
    public $content;

    /**
     * {@inheritdoc}
     */
    public function getGroupSequence()
    {
        return ['Post', 'MyGroup'];
    }
}
