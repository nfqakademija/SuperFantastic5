<?php

namespace Nfq\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nfq\LibraryBundle\Entity\Tags;
use Nfq\LibraryBundle\Entity\Users;
use Nfq\LibraryBundle\Entity\Descriptions;
use Nfq\LibraryBundle\Entity\Books;
use Nfq\LibraryBundle\Entity\Orders;

class LoadUsersData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tagdata = [
            "mokslinė fantastika",
            "politinė filosofija",
            "C++",
            "php",
            "grožinė literatūra",
            "istorija",
            "filosofija"
        ];
        
        $userdata = [
            [
                'firstname' => 'Vardenis',
                'lastname'  => 'Pavardenis',
                'email'     => 'admin@domain.dom',
                'password'  => 'test',
                'salt'      => 'whatstrangefieldissalt',
                'is_admin'  => '1',
                'tags'      => [0, 1]
            ],
            [
                'firstname' => 'Paprastas',
                'lastname'  => 'Vartotojas',
                'email'     => 'ordinary@domain.dom',
                'password'  => 'tester',
                'salt'      => 'whatstrangefieldissalt',
                'is_admin'  => '0',
                'tags'      => [1, 2]
            ],
            [
                'firstname' => 'Kitas',
                'lastname'  => 'Vartotojas',
                'email'     => 'kitas@domain.dom',
                'password'  => 'tester',
                'salt'      => 'whatstrangefieldissalt',
                'is_admin'  => '0',
                'tags'      => [2, 3]
            ]
        ];
        
        $descriptiondata  = [
            [
            'author'        => 'Vytautas Landsbergis',
            'title'         => 'Pasakėčios',
            'coverurl'      => 'http://ecx.images-amazon.com/images/I/31ULDEQrdyL._SL194_.jpg',
            'language'      => 'lt',
            'description'   => 'bla bla bla',
            'publisher'     => 'Kronta',
            'year'          => '2011',
            'pageno'        => 328,
            'isbn'          => '9786094010446',
            'tags'          => [4]
            ],
            [
            'author'        => 'Juozas Erlickas',
            'title'         => 'Prisimynimai',
            'coverurl'      => '',
            'language'      => 'lt',
            'description'   => 'bla bla bla',
            'publisher'     => 'Tyto alba',
            'year'          => '2004',
            'pageno'        => 150,
            'isbn'          => '9789986163886',
            'tags'          => [4]
            ],
            [
            'author'        => 'Arvydas Šliogeris',
            'title'         => 'The Thing and Art: Two Essays on the Ontotopy of the Work of Art. (On the Boundary of Two Worlds)',
            'coverurl'      => 'http://ecx.images-amazon.com/images/I/51kVb79WAjL._SL194_.jpg',
            'language'      => 'lt',
            'description'   => 'bla bla bla',
            'publisher'     => 'Rodopi',
            'year'          => '2009',
            'pageno'        => 180,
            'isbn'          => '9789042025646',
            'tags'          => [6]
            ],
            [
            'author'        => 'Ray Bradbury',
            'title'         => 'Fahrenheit 451: A Novel',
            'coverurl'      => 'http://ecx.images-amazon.com/images/I/51kVb79WAjL._SL194_.jpg',
            'language'      => 'en',
            'description'   => 'bla bla bla',
            'publisher'     => 'Simon & Schuster',
            'year'          => '2013',
            'pageno'        => 132,
            'isbn'          => '9781451673319',
            'tags'          => [0, 4]
            ]
        ];
        
        $bookdata = [
            [
                'description' => 0,
                'owner'       => 1
            ],
            [
                'description' => 1,
                'owner'       => 1
            ],
            [
                'description' => 2,
                'owner'       => 2
            ],
            [
                'description' => 3,
                'owner'       => 0
            ]
        ];
        
        $orderdata = [
            [
                'book'       => 0,
                'reader'     => 0,
                'reservedat' => '2015-01-01',
                'takenat'    => '2015-01-02',
                'toreturnat' => '2015-01-03',
                'returnedat' => '2015-01-04'
            ],
            [
                'book'       => 1,
                'reader'     => 1,
                'reservedat' => '2015-01-01',
                'takenat'    => '2015-01-02',
                'toreturnat' => '2015-01-03',
                'returnedat' => '2000-01-01'
            ],
            [
                'book'       => 2,
                'reader'     => 2,
                'reservedat' => '2015-01-01',
                'takenat'    => '2015-01-02',
                'toreturnat' => '2000-01-01',
                'returnedat' => '2000-01-01'
            ],
            [
                'book'       => 3,
                'reader'     => 0,
                'reservedat' => '2015-01-01',
                'takenat'    => '2000-01-01',
                'toreturnat' => '2000-01-01',
                'returnedat' => '2000-01-01'
            ]
        ];

        $alltags = [];
        foreach ($tagdata as $tag){
            $alltags[] = new Tags();
            $lastitem = $alltags[count($alltags) - 1];
            $lastitem->setTag($tag);
        }

        $allusers = [];
        foreach ($userdata as $user){
            $allusers[] = new Users();
            $lastitem = $allusers[count($allusers) - 1];
            $lastitem->setFirstname($user['firstname']);
            $lastitem->setLastname($user['lastname']);
            $lastitem->setEmail($user['email']);
            $lastitem->setPassword($user['password']);
            $lastitem->setSalt($user['salt']);
            $lastitem->setIsAdmin($user['is_admin']);
            foreach ($user['tags'] as $tagid){
                $lastitem->addTag($alltags[$tagid]);
            }
        }
        
        $alldescriptions = [];
        foreach ($descriptiondata as $description){
            $alldescriptions[] = new Descriptions();
            $lastitem = $alldescriptions[count($alldescriptions) - 1];
            $lastitem->setAuthor($description['author']);
            $lastitem->setTitle($description['title']);
            $lastitem->setCoverUrl($description['coverurl']);
            $lastitem->setLanguage($description['language']);
            $lastitem->setDescription($description['description']);
            $lastitem->setPublisher($description['publisher']);
            $lastitem->setYear($description['year']);
            $lastitem->setPageNo($description['pageno']);
            $lastitem->setIsbn($description['isbn']);
            foreach ($description['tags'] as $tagid){
                $lastitem->addTag($alltags[$tagid]);
            }
        }
        
        $allbooks = [];
        foreach ($bookdata as $book){
            $allbooks[] = new Books();
            $lastitem = $allbooks[count($allbooks) - 1];
            $lastitem->setDescription($alldescriptions[$book['description']]);
            $lastitem->setOwner($allusers[$book['owner']]);
        }
        
        $allorders = [];
        foreach ($orderdata as $order){
            $allorders[] = new Orders();
            $lastitem = $allorders[count($allorders) - 1];
            $lastitem->setBook($allbooks[$order['book']]);
            $lastitem->setReader($allusers[$order['reader']]);
            $lastitem->setReservedAt(new \DateTime($order['reservedat']));
            $lastitem->setTakenAt(new \DateTime($order['takenat']));
            $lastitem->setToReturnAt(new \DateTime($order['toreturnat']));
            $lastitem->setReturnedAt(new \DateTime($order['returnedat']));
        }
        
        $allitems = array_merge($alltags, $allusers, $alldescriptions, $allbooks, $allorders);
        foreach($allitems as $item){
            $manager->persist($item);
        }
        
        $manager->flush();

    }
} 