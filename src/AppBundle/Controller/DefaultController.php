<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        // store data
        $user = new User();
        $user->name = 'User';

        $post = new Post();
        $post->content = 'Content';
        $user->post = $post;

        $em->persist($user);
        $em->persist($post);

        $em->flush();
        $em->clear();

        // test validator w/o proxies
        $user->post->content = '';
        $errors = $this->get('validator')->validate($user);

        var_dump($errors);

        // test validator w/ proxies
        $user = $em->find(User::class, $user->id);
        $user->post->title = '';
        $errors = $this->get('validator')->validate($user);

        var_dump($errors);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
