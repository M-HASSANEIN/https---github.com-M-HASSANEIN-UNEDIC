<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{

    /**
     * @Route("/", name="ShowALLStudents")
     */
    public function ShowAllStudents(StudentRepository $studentRepository): Response
    {
        $students = $studentRepository->findAll();
        return $this->render('show_students.html.twig', ["students" => $students]);
    }

    /**
     * @Route("creat", name="AddStudent")
     */
    public function AddStudent(Request $request): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $student = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
            $this->addFlash("success", "Your data has been added");
            return $this->redirectToRoute("ShowALLStudents");
        }
        return $this->render('add_students.html.twig', [
            "formAdd" => $form->createView(),
        ]);
    }
    /**
     * @Route("/update/{id}", name="update")
     */
    public function UpdateStudent(Request $request, $id, StudentRepository $studentRepository): Response
    {

        $student = $studentRepository->find($id);
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $student = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
            $this->addFlash("success", "Your data has been updated");
            return $this->redirectToRoute("ShowALLStudents");
        }
        return $this->render('update_student.html.twig', [
            "formEdit" => $form->createView(),
        ]);

    }
    /**
     * @Route("/delete/{id<[0-9]+>}", name="delete" )
     */
    public function DeleteStudent(Request $request, $id, StudentRepository $studentRepository): Response
    {
        $student = $studentRepository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($student);
        $em->flush();
        $this->addFlash("success", "Your data has been deleted");
        return $this->redirectToRoute("ShowALLStudents");
    }

}
