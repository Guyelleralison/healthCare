<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Patient;
use App\Entity\User;
use App\Form\PatientCreateType;
use App\Form\UserType;
use App\Service\PatientService;

class PatientController extends AbstractController
{
    private PatientService $patientService;

    public function __construct(PatientService $patientService) {
        $this->patientService = $patientService;
    }
    /**
     * @Route("/patient", name="patient")
     */
    public function index(Request $request): Response
    {
        $patient = new Patient();
        $user = new User();
        $formCreatePatient = $this->createForm(PatientCreateType::class, $patient);
        $formLogin = $this->createForm(UserType::class, $user);
        $formCreatePatient->handleRequest($request);
        $formLogin->handleRequest($request);

        if ($formCreatePatient->isSubmitted() && $formCreatePatient->isValid()) {
            $patient->setCreatedDate(new \DateTime());
            $patient->setRoles(['USER', 'PATIENT']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($patient);
            $entityManager->flush();
            return $this->redirectToRoute('patient');
        }

        return $this->render('patient/index.html.twig', [
            'form' => $formCreatePatient->createView(),
            'formLogin' =>$formLogin->createView()
        ]);
    }
}
