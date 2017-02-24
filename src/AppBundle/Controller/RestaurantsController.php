<?php
/**
 * Created by PhpStorm.
 * User: stijnblommerde
 * Date: 24/02/17
 * Time: 11:01
 */

namespace AppBundle\Controller;


use AppBundle\Form\Type\RestaurantType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RestaurantsController extends Controller
{

    /**
     * @Route("/restaurants", name="restaurants")
     */
    public function showRestaurantsAction() {
//        return new Response('hello world!');
        $restaurants = $this->getDoctrine()->getRepository('AppBundle\Entity\Restaurant')->findAll();
//        var_dump($restaurants);
        return $this->render(':restaurants:restaurants.html.twig', ['restaurants' => $restaurants]);
    }

    /**
     * @Route("restaurant/new", name="new_restaurant")
     */
    public function createRestaurantAction(Request $request) {
        $form = $this->createForm(RestaurantType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $restaurant = $form->getData();
            $em->persist($restaurant);
            $em->flush();

            return $this->redirectToRoute('restaurants');
        }

        return $this->render(':restaurants:createRestaurant.html.twig', ['myForm' => $form->createView()]);
    }

    /**
     * @Route("restaurant/edit/{restaurantId}", name="edit_restaurant")
     */
    public function editRestaurantAction(Request $request, $restaurantId) {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository('AppBundle:Restaurant')->find($restaurantId);

        $form = $this->createForm(RestaurantType::class, $restaurant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('restaurants');
        }

        return $this->render(':restaurants:editRestaurant.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    /**
     * @Route("restaurant/delete/{restaurantId}", name="delete_restaurant")
     */
    public function deleteRestaurantAction(Request $request, $restaurantId) {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository('AppBundle:Restaurant')->find($restaurantId);
        $form = $this->createForm(RestaurantType::class);
        echo "1";
        $form->handleRequest($request);
        echo "2";

        if ($form->isSubmitted() && $form->isValid()) {
            echo "3";
            $em->remove($restaurant);
            $em->flush();
            return $this->redirectToRoute('restaurants');
        }
        return $this->render(':restaurants:deleteRestaurant.html.twig', [
            'myForm' => $form->createView(),
            'restaurant' => $restaurant
        ]);
    }
}