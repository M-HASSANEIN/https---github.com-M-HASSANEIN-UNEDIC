<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiStudentController extends AbstractController
{

    /**
     * @Route("/api/students", name="api_student_index", methods={"GET"})
     */

    public function __invoke(): Response
    {
        $students = $this->getDoctrine()->getRepository(persistentObject:Student::class)->findAll();

        return $this->render('api_list.html.twig', ["students" => $students]);
    }

}
