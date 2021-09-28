<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultBlogPostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_posts')->delete();
        
        \DB::table('blog_posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 77,
                'title' => 'LOREM IPSUM IS DOLOR SIT AMET',
                'slug' => 'lorem-ipsum-is-dolor-sit-amet',
                'content' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam possimus modi itaque explicabo minima fugit quod illum, dolore corrupti tempora officia temporibus atque unde mollitia ad veniam non delectus. Itaque, odit. Quisquam sed deleniti, necessitatibus voluptatibus maxime odio officiis commodi temporibus consequuntur quam. Aliquam ipsa in sequi dignissimos minus doloribus odit nesciunt ipsum assumenda consequatur magni excepturi dicta similique saepe quae voluptatem at perspiciatis, iusto harum deserunt? Amet iste praesentium id cumque quia assumenda culpa ea eveniet, quis magnam, aliquam rerum vel quod consectetur eaque at illo possimus rem laboriosam veritatis. Dolores atque aliquid cumque sit! Nam quaerat tenetur debitis impedit animi explicabo rerum officia eligendi sequi natus odio earum consequuntur minus itaque molestiae atque facere quis voluptates, neque inventore! Minima doloremque minus totam eius tenetur, cum a consectetur vero nemo temporibus facilis vitae repudiandae blanditiis nam eos ex, perspiciatis vel et dolor pariatur, sequi rem odio. Debitis quas sit deserunt, officia aperiam doloremque reiciendis officiis animi maiores sint neque natus et labore architecto sequi nam veritatis minima quisquam alias rem quam similique nulla culpa. Harum ratione rem eos quibusdam, veniam aliquam dolores provident mollitia qui eaque, accusantium perspiciatis magnam assumenda nihil. Voluptatibus, dignissimos, fugiat, minima deserunt maiores deleniti quis accusantium alias tempora voluptatem sunt in necessitatibus delectus. Culpa similique iure neque, facere facilis numquam ipsam voluptatum quasi optio tempore debitis, explicabo nesciunt vel soluta, recusandae dolore ab ullam deserunt minima molestias itaque! Suscipit vero accusamus modi nulla perspiciatis esse, praesentium explicabo inventore expedita molestias ipsa doloribus quaerat dolores ratione eius reprehenderit? Accusantium ratione vitae quam, commodi itaque perspiciatis ullam error sunt veniam nemo fugit esse facere, adipisci praesentium consequuntur ducimus cumque doloremque. Soluta, esse. A, sint. Ea ut deserunt tempora quia deleniti iusto officiis quos eum at vitae quisquam vel sint dolore libero nobis, tempore dicta harum eius aspernatur molestiae fugiat iste. Cum id non ab nemo, voluptate distinctio aliquam magnam neque? Temporibus nemo modi eos blanditiis consequuntur sed quaerat neque qui ratione aut veniam atque asperiores iste earum sunt autem, dolorum eaque harum voluptatum eum incidunt expedita quas? Soluta architecto consequuntur a sunt earum, ipsum reprehenderit, perspiciatis dolorum laboriosam, sequi eum inventore? Temporibus reiciendis laborum architecto quaerat cumque assumenda modi pariatur voluptatem quae recusandae ea rerum tempore, rem unde ipsam id eveniet sapiente nam voluptatum optio ex perspiciatis! Quae omnis repellendus veniam? Unde excepturi asperiores tempora error rem esse inventore optio est quibusdam at quasi facilis, ad nam natus repellendus dicta modi aut fugiat mollitia nihil vel magni, corporis soluta? Ut rerum magni provident maxime natus. Quidem optio iusto dolorum voluptatum sed quam alias accusantium harum explicabo aliquid, molestiae nisi beatae voluptas ea quo inventore sapiente ullam suscipit esse autem ut in. Cumque vitae, doloribus sequi aliquam expedita, accusantium recusandae tenetur dolor eum quos fuga veritatis omnis beatae molestias? Quaerat accusantium nesciunt similique consectetur, inventore quo eaque, minus autem libero sapiente beatae animi quos laudantium? Officiis rerum distinctio ipsa eos in magni mollitia aliquam quibusdam! Tempore ea, dolorum error cumque id atque autem fugiat deleniti labore, modi provident.</p>',
                'excerpt' => NULL,
                'status' => 'publish',
                'allow_comment' => 1,
                'moderate_comment' => 0,
                'created_at' => '2021-02-23 10:09:12',
                'updated_at' => '2021-02-23 10:14:53',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}