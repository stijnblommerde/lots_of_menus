<?php
/**
 * Created by PhpStorm.
 * User: stijnblommerde
 * Date: 25/02/17
 * Time: 21:58
 */

namespace AppBundle\Controller;


use AppBundle\Form\Type\MenuItemType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MenuItemsController extends Controller
{
    /**
     * @Route("/restaurant/{restaurantId}/menu", name="show_menu")
     */
    public function showMenuAction($restaurantId)
    {
        $menuItems = $this->getDoctrine()->getRepository('AppBundle\Entity\MenuItem')
            ->findBy(['restaurant' => $restaurantId]);
        return $this->render(':menu_items:show_menu_items.html.twig', [
            'menu_items' => $menuItems,
            'restaurant_id' => $restaurantId,
        ]);
    }

    /**
     * @Route("/restaurant/{restaurantId}/menu/new", name="new_menu_item")
     */
    public function createMenuItemAction($restaurantId, Request $request)
    {
        $form = $this->createForm(MenuItemType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $menuItem = $form->getData();
            // create association with restaurant
            $restaurant = $this->getDoctrine()->getRepository('AppBundle:Restaurant')
                ->find($restaurantId);
            $menuItem->setRestaurant($restaurant);
            $em->persist($menuItem);
            $em->flush();
            $this->addFlash('success', 'Menu Item created!');
            return $this->redirectToRoute('show_menu', [
                'restaurantId'=> $restaurantId]);
        }
        return $this->render(':menu_items:create_menu_item.html.twig', [
            'restaurant_id' => $restaurantId,
            'menu_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/restaurant/{restaurantId}/menu/{menuItemId}/edit", name="edit_menu_item")
     */
    public function editMenuItemAction($restaurantId, $menuItemId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $menuItem = $em->getRepository('AppBundle:MenuItem')->find($menuItemId);
        $form = $this->createForm(MenuItemType::class, $menuItem);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Menu item changed!');
            return $this->redirectToRoute('show_menu', [
                'restaurantId'=> $restaurantId]);
        }
        return $this->render(':menu_items:edit_menu_item.html.twig', [
            'restaurant_id' => $restaurantId,
            'menu_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/restaurant/{restaurantId}/menu/{menuItemId}/delete", name="delete_menu_item")
     */
    public function deleteMenuItemAction($restaurantId, $menuItemId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $menuItem = $em->getRepository('AppBundle:MenuItem')->find($menuItemId);
        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->remove($menuItem);
            $em->flush();
            $this->addFlash('success', 'Menu item deleted!');
            return $this->redirectToRoute('show_menu', [
                'restaurantId'=> $restaurantId]);
        }
        return $this->render(':menu_items:delete_menu_item.html.twig', [
            'restaurant_id' => $restaurantId,
            'menu_form' => $form->createView(),
            'menu_item' => $menuItem,
        ]);
    }


}