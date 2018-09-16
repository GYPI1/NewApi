<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Student;
use Symfony\Component\HttpFoundation\JsonResponse;


class StudentController extends Controller
{
    /**
     * @FOSRest\View()
     * @FOSRest\Get("/students")
     */
    public function getAllStudent(Request $request)
    {
        $student = $this->get('doctrine.orm.entity_manager')
        ->getRepository(Student::class)
        ->findAll();

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET,POST');
        header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );

        return $student;
    }
}
