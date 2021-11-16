<?php

namespace App\Controller;

use App\Entity\Playlist;
use App\Form\SurveyFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SurveyController extends AbstractController
{
    /**
     * @Route("/sondage", name="sondage")
     * @param Request $request
     * @return Response
     */
    public function addMusic(Request $request): Response
    {
        $music = new Playlist();
        $form = $this->createForm(SurveyFormType::class, $music);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($music);
            $em->flush();

            $this->addFlash('success', 'Merci de ta participation :-)');

            return $this->redirectToRoute('sondage');
        }
        return $this->render('survey/index.html.twig', [
            'form' => $form->createView()]);
    }


}
