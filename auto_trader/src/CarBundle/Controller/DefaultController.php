<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="car-page")
     */
    public function indexAction(Request $request)
    {

        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $cars = $carRepository->FindCarsWithDetails();

        $form = $this->createFormBuilder()
            ->add('search', TypeTextType::class,['constraints' =>[
                new NotBlank(),
                new Length(['min'=>3])
            ]])
            ->setMethod('GET')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            die('Form Submitted');
        }

        return $this->render('default/CarBundleV/car.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'cars' => $cars, 'form' => $form->createView()
        ]);
    }

    /**
     * @param integer $id
     * @Route("/",name="showCar")
     */
    // public function showAction($id)
    // {
    //     $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
    //     $car = $carRepository->find($id);

    //     return $car;
    // }
}
