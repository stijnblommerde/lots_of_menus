<?php
/**
 * Created by PhpStorm.
 * User: stijnblommerde
 * Date: 26/02/17
 * Time: 20:43
 */

namespace AppBundle\DataFixtures\ORM;



use AppBundle\Entity\MenuItem;
use AppBundle\Entity\Restaurant;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMenuData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $records = [
            'restaurant1' => [],
            'restaurant2' => [],
            'restaurant3' => [],
        ];

        $restaurant1 = new Restaurant();
        $restaurant1->setName("Urban Burger");
        array_push($records['restaurant1'], $restaurant1);

        $menuItem1 = new MenuItem();
        $menuItem1->setName("Veggie Burger");
        $menuItem1->setDescription("Juicy grilled veggie patty with tomato mayo and lettuce");
        $menuItem1->setPrice(7.50);
        $menuItem1->setCourse("Entree");
        $menuItem1->setRestaurant($restaurant1);
        array_push($records['restaurant1'], $menuItem1);

        $menuItem2 = new MenuItem();
        $menuItem2->setName("French Fries");
        $menuItem2->setDescription("with garlic and parmesan");
        $menuItem2->setPrice(2.99);
        $menuItem2->setCourse("Appetizer");
        $menuItem2->setRestaurant($restaurant1);
        array_push($records['restaurant1'], $menuItem2);

        $menuItem3 = new MenuItem();
        $menuItem3->setName("Chicken Burger");
        $menuItem3->setDescription("Juicy grilled chicken patty with tomato mayo and lettuce");
        $menuItem3->setPrice(5.50);
        $menuItem3->setCourse("Entree");
        $menuItem3->setRestaurant($restaurant1);
        array_push($records['restaurant1'], $menuItem3);

        unset($menuItem1, $menuItem2, $menuItem3);

        $restaurant2 = new Restaurant();
        $restaurant2->setName("Super Stir Fry");
        array_push($records['restaurant2'], $restaurant2);

        $menuItem1 = new MenuItem();
        $menuItem1->setName("Chicken Stir Fry");
        $menuItem1->setDescription("With your choice of noodles vegetables and sauces");
        $menuItem1->setPrice(7.99);
        $menuItem1->setCourse("Entree");
        $menuItem1->setRestaurant($restaurant2);
        array_push($records['restaurant2'], $menuItem1);

        $menuItem2 = new MenuItem();
        $menuItem2->setName("Peking Duck");
        $menuItem2->setDescription("A famous duck dish from Beijing[1] that has been prepared since the imperial era. The meat is prized for its thin, crisp skin, with authentic versions of the dish serving mostly the skin and little meat, sliced in front of the diners by the cook");
        $menuItem2->setPrice(25.00);
        $menuItem2->setCourse("Entree");
        $menuItem2->setRestaurant($restaurant2);
        array_push($records['restaurant2'], $menuItem2);

        $menuItem3 = new MenuItem();
        $menuItem3->setName("Spicy Tuna Roll");
        $menuItem3->setDescription("Seared rare ahi, avocado, edamame, cucumber with wasabi soy sauce");
        $menuItem3->setPrice(15.00);
        $menuItem3->setCourse("Entree");
        $menuItem3->setRestaurant($restaurant2);
        array_push($records['restaurant2'], $menuItem3);

        unset($menuItem1, $menuItem2, $menuItem3);

        $restaurant3 = new Restaurant();
        $restaurant3->setName("Panda Garden");
        array_push($records['restaurant3'], $restaurant3);

        $menuItem1 = new MenuItem();
        $menuItem1->setName("Pho");
        $menuItem1->setDescription("a Vietnamese noodle soup consisting of broth, linguine-shaped rice noodles called banh pho, a few herbs, and meat.");
        $menuItem1->setPrice(8.99);
        $menuItem1->setCourse("Entree");
        $menuItem1->setRestaurant($restaurant3);
        array_push($records['restaurant3'], $menuItem1);

        $menuItem2 = new MenuItem();
        $menuItem2->setName("Chinese Dumplings");
        $menuItem2->setDescription("a common Chinese dumpling which generally consists of minced meat and finely chopped vegetables wrapped into a piece of dough skin. The skin can be either thin and elastic or thicker.");
        $menuItem2->setPrice(6.99);
        $menuItem2->setCourse("Appetizer");
        $menuItem2->setRestaurant($restaurant3);
        array_push($records['restaurant3'], $menuItem2);

        $menuItem3 = new MenuItem();
        $menuItem3->setName("Gyoza");
        $menuItem3->setDescription("The most prominent differences between Japanese-style gyoza and Chinese-style jiaozi are the rich garlic flavor, which is less noticeable in the Chinese version, the light seasoning of Japanese gyoza with salt and soy sauce, and the fact that gyoza wrappers are much thinner");
        $menuItem3->setPrice(9.95);
        $menuItem3->setCourse("Entree");
        $menuItem3->setRestaurant($restaurant3);
        array_push($records['restaurant3'], $menuItem3);

        unset($menuItem1, $menuItem2, $menuItem3);        
        
        foreach ($records as $key => $items){
            foreach ($items as $item) {
                $manager->persist($item);
                $manager->flush();
            }
        }

        





    }
}