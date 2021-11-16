<?php

namespace App\Controller;

use App\Entity\Presence;
use App\Form\PresenceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresenceController extends AbstractController
{
    /**
     * @Route("/presence", name="presence")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {

        $presence = new Presence();
        $form = $this->createForm(PresenceType::class, $presence);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($presence);
            $em->flush();

            $this->addFlash('success', 'Confirmation envoyé');

            return $this->redirectToRoute('presence');
        }
        return $this->render('presence/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
