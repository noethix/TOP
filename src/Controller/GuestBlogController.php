<?php

namespace App\Controller;

use App\Entity\GuestBlog;
use App\Form\GuestBlogType;
use App\Repository\GuestBlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/guest/blog")
 */
class GuestBlogController extends AbstractController
{
    /**
     * @Route("/", name="guest_blog_index", methods={"GET"})
     */
    public function index(GuestBlogRepository $guestBlogRepository): Response
    {
        return $this->render('guest_blog/index.html.twig', [
            'guest_blogs' => $guestBlogRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="guest_blog_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $guestBlog = new GuestBlog();
        $form = $this->createForm(GuestBlogType::class, $guestBlog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($guestBlog);
            $entityManager->flush();

            return $this->redirectToRoute('guest_blog_index');
        }

        return $this->render('guest_blog/new.html.twig', [
            'guest_blog' => $guestBlog,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="guest_blog_show", methods={"GET"})
     */
    public function show(GuestBlog $guestBlog): Response
    {
        return $this->render('guest_blog/show.html.twig', [
            'guest_blog' => $guestBlog,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="guest_blog_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GuestBlog $guestBlog): Response
    {
        $form = $this->createForm(GuestBlogType::class, $guestBlog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('guest_blog_index');
        }

        return $this->render('guest_blog/edit.html.twig', [
            'guest_blog' => $guestBlog,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="guest_blog_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GuestBlog $guestBlog): Response
    {
        if ($this->isCsrfTokenValid('delete'.$guestBlog->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($guestBlog);
            $entityManager->flush();
        }

        return $this->redirectToRoute('guest_blog_index');
    }
}