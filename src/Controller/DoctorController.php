<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Doctor;
use App\Entity\User;
use App\Form\DoctorCreateType;
use App\Form\DoctorType;
use App\Form\UserType;

class DoctorController extends AbstractController
{
    /**
     * @Route("/doctor", name="doctor")
     */
    public function index(Request $request): Response
    {
        $doctor = new Doctor();
        $user = new User();
        $formCreateDoctor = $this->createForm(DoctorCreateType::class, $doctor);
        $formLogin = $this->createForm(UserType::class, $user);
        $formCreateDoctor->handleRequest($request);
        $formLogin->handleRequest($request);

        if ($formCreateDoctor->isSubmitted() && $formCreateDoctor->isValid()) {
            $doctor->setCreatedDate(new \DateTime());
            $doctor->setRoles(['USER', $doctor->getStatus()]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($doctor);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('doctor/index.html.twig', [
            'form' => $formCreateDoctor->createView(),
            'formLogin' =>$formLogin->createView()
        ]);
    }
}
