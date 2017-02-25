<?php
/**
 * Created by PhpStorm.
 * User: stijnblommerde
 * Date: 25/02/17
 * Time: 21:58
 */

namespace AppBundle\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MenuItemsController extends Controller
{
    /**
     * @Route("/restaurant/{restaurantId}/menu", name="menu")
     */
    public function showRestaurantMenuAction($restaurantId)
    {
        $menuItems = $this->getDoctrine()->getRepository('AppBundle\Entity\MenuItem')
            ->findBy(['restaurant' => $restaurantId]);
        return $this->render(':menu_items:menu_items.html.twig', [
            'menu_items' => $menuItems,
            'restaurant_id' => $restaurantId,
        ]);
    }

}