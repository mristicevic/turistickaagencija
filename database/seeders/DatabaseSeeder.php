<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     /*
        $user1 = User::create([
            
            'name'=>'Mika',
            'email'=>'mika@gmail.com',
            'password'=>Hash::make('Mika123123'),
            'adress'=>'Ulice Mike Petrovica'
        ]);
*/
        // \App\Models\User::factory(10)->create();
        $product1 = Product::create([
            'title'=>'The Marauders Map - Replica',
            'price'=>'20$',
            'description'=>'Navigate your way around Hogwarts School of Witchcraft and Wizardry with this Marauders Map replica.',
            'quantity'=>'work-post',
            'image' => 'mapa.png'
        ]);
        $product2 = Product::create([
            'title'=>'Hogwarts Express Souvenir Ticket',
            'price'=>'4$',
            'description'=>'The Hogwarts Express ticket is embellished with gold foil, and is based on the original artwork by MinaLima, the graphic duo, who designed all the original graphic elements for the Harry Potter films.',
            'quantity'=>'work-post',
            'image' => 'voz.png'
        ]);
        $product3 = Product::create([
            'title'=>'The Golden Snitch Keyring',
            'price'=>'10$',
            'description'=>'Golden Snitch keyring features a 3D replica of the iconic Golden Snitch, the most sought-after ball in every Quidditch game.',
            'quantity'=>'work-post',
            'image' => 'privezak.png'
        ]);
        $product4 = Product::create([
            'title'=>'Hedwig Soft Toy - Small',
            'price'=>'8$',
            'description'=>'Add this beautiful replica of Harry Potters loyal snowy owl Hedwig to your Harry Potter collection.',
            'quantity'=>'work-post',
            'image' => 'sova.png'
        ]);
        $product6 = Product::create([
            'title'=>'Platform 9 3/4 Mug & Spoon',
            'price'=>'12$',
            'description'=>'This exclusive burgundy mug features a gold Platform 9 3/4 logo and comes with its very own spoon.',
            'quantity'=>'work-post',
            'image' => 'solja.png'
        ]);
        $product7 = Product::create([
            'title'=>'Harry Potter Wooden Wand',
            'price'=>'50$',
            'description'=>'One of the most famous wizards of all time, Harry Potter learnt on his 11th birthday that he was destined to attend Hogwarts School of Witchcraft and Wizardry.',
            'quantity'=>'work-post',
            'image' => 'stapic.png'
        ]);
    }
}
