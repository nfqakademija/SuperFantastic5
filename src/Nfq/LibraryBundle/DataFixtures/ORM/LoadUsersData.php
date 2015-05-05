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
                'firstname'   => 'Vardenis',
                'lastname'    => 'Pavardenis',
                'email'       => 'admin@domain.dom',
                'password'    => 'test',
                'salt'        => 'whatstrangefieldissalt',
                'is_admin'    => '1',
                'tags'        => [0, 1]
            ],
            [
                'firstname'   => 'Paprastas',
                'lastname'    => 'Vartotojas',
                'email'       => 'ordinary@domain.dom',
                'password'    => 'tester',
                'salt'        => 'whatstrangefieldissalt',
                'is_admin'    => '0',
                'tags'        => [1, 2]
            ],
            [
                'firstname'   => 'Kitas',
                'lastname'    => 'Vartotojas',
                'email'       => 'kitas@domain.dom',
                'password'    => 'tester',
                'salt'        => 'whatstrangefieldissalt',
                'is_admin'    => '0',
                'tags'        => [2, 3]
            ]
        ];

        $descriptiondata = [
            [
                'author'      => 'Vytautas Landsbergis',
                'title'       => 'Pasakėčios',
                'coverurl'    => 'http://ecx.images-amazon.com/images/I/31ULDEQrdyL._SL194_.jpg',
                'language'    => 'lt',
                'description' => 'bla bla bla',
                'publisher'   => 'Kronta',
                'year'        => '2011-05-05',
                'pageno'      => 328,
                'isbn'        => '9786094010446',
                'tags'        => [4]
            ],
            [
                'author'      => 'Juozas Erlickas',
                'title'       => 'Prisimynimai',
                'coverurl'    => 'http://ecx.images-amazon.com/images/I/31ULDEQrdyL._SL194_.jpg',
                'language'    => 'lt',
                'description' => 'bla bla bla',
                'publisher'   => 'Tyto alba',
                'year'        => '2004',
                'pageno'      => 150,
                'isbn'        => '9789986163886',
                'tags'        => [4]
            ],
            [
                'author'      => 'Arvydas Šliogeris',
                'title'       => 'The Thing and Art: Two Essays on the Ontotopy of the Work of Art. (On the Boundary of Two Worlds)',
                'coverurl'    => 'http://ecx.images-amazon.com/images/I/51kVb79WAjL._SL194_.jpg',
                'language'    => 'lt',
                'description' => 'bla bla bla',
                'publisher'   => 'Rodopi',
                'year'        => '2009',
                'pageno'      => 180,
                'isbn'        => '9789042025646',
                'tags'        => [6]
            ],
            [
                'author'      => 'Ray Bradbury',
                'title'       => 'Fahrenheit 451: A Novel',
                'coverurl'    => 'http://ecx.images-amazon.com/images/I/51kVb79WAjL._SL194_.jpg',
                'language'    => 'en',
                'description' => ' The terrifyingly prophetic novel of a post-literate future.

Guy Montag is a fireman. His job is to burn books, which are forbidden, being the source of all discord and unhappiness. Even so, Montag is unhappy; there is discord in his marriage. Are books hidden in his house? The Mechanical Hound of the Fire Department, armed with a lethal hypodermic, escorted by helicopters, is ready to track down those dissidents who defy society to preserve and read books.

The classic dystopian novel of a post-literate future, Fahrenheit 451 stands alongside Orwell’s 1984 and Huxley’s Brave New World as a prophetic account of Western civilization’s enslavement by the media, drugs and conformity.

Bradbury’s powerful and poetic prose combines with uncanny insight into the potential of technology to create a novel which, decades on from first publication, still has the power to dazzle and shock.',
                'publisher'   => 'Simon & Schuster',
                'year'        => '2013',
                'pageno'      => 132,
                'isbn'        => '9781451673319',
                'tags'        => [0, 4]
            ]
        ];

        $bookdata = [
            [
                'description' => 0,
                'owner'       => 0,
                'added_at'    => '2015-01-01'
            ],
            [
                'description' => 1,
                'owner'       => 0,
                'added_at'    => '2015-01-02'
            ],
            [
                'description' => 1,
                'owner'       => 1,
                'added_at'    => '2015-01-03'
            ],
            [
                'description' => 2,
                'owner'       => 2,
                'added_at'    => '2015-01-04'
            ],
            [
                'description' => 3,
                'owner'       => 0,
                'added_at'    => '2015-01-05'
            ]
        ];

        $orderdata = [
            [
                'reader'      => 0,
                'description' => 0,
                'reservedat'  => '2015-01-01',
                'book'        => 0,
                'takenat'     => '2015-01-02',
                'toreturnat'  => '2015-01-03',
                'returnedat'  => '2015-01-04'
            ],
            [
                'reader'      => 1,
                'description' => 0,
                'reservedat'  => '2015-01-03',
                'book'        => null,
                'takenat'     => null,
                'toreturnat'  => null,
                'returnedat'  => null
            ],
            [
                'reader'      => 1,
                'description' => 1,
                'reservedat'  => '2015-01-01',
                'book'        => 1,
                'takenat'     => '2015-01-02',
                'toreturnat'  => '2015-01-03',
                'returnedat'  => null
            ],
            [
                'reader'      => 2,
                'description' => 1,
                'reservedat'  => '2015-01-01',
                'book'        => 2,
                'takenat'     => '2015-01-02',
                'toreturnat'  => '2015-01-06',
                'returnedat'  => '2015-01-06'
            ],
            [
                'reader'      => 0,
                'description' => 1,
                'reservedat'  => '2015-01-03',
                'book'        => 2,
                'takenat'     => '2015-01-06',
                'toreturnat'  => null,
                'returnedat'  => null
            ],
            [
                'reader' => 0,
                'description' => 2,
                'reservedat'  => '2015-01-01',
                'book'        => 3,
                'takenat'     => '2015-01-04',
                'toreturnat'  => null,
                'returnedat'  => null
            ],
            [
                'reader'      => 0,
                'description' => 3,
                'reservedat'  => '2015-01-01',
                'book'        => 4,
                'takenat'     => '2015-01-05',
                'toreturnat'  => null,
                'returnedat'  => null
            ]
        ];

        $alltags = [];
        foreach ($tagdata as $tag) {
            $alltags[] = new Tags();
            $lastitem = $alltags[count($alltags) - 1];
            $lastitem->setTag($tag);
        }

        $allusers = [];
        foreach ($userdata as $user) {
            $allusers[] = new Users();
            $lastitem = $allusers[count($allusers) - 1];
            $lastitem->setFirstname($user['firstname']);
            $lastitem->setLastname($user['lastname']);
            $lastitem->setEmail($user['email']);
            $lastitem->setPassword($user['password']);
            $lastitem->setSalt($user['salt']);
            $lastitem->setIsAdmin($user['is_admin']);
            foreach ($user['tags'] as $tagid) {
                $lastitem->addTag($alltags[$tagid]);
            }
        }

        $alldescriptions = [];
        foreach ($descriptiondata as $description) {
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
            foreach ($description['tags'] as $tagid) {
                $lastitem->addTag($alltags[$tagid]);
            }
        }

        $allbooks = [];
        foreach ($bookdata as $book) {
            $allbooks[] = new Books();
            $lastitem = $allbooks[count($allbooks) - 1];
            $lastitem->setDescription($alldescriptions[$book['description']]);
            $lastitem->setOwner($allusers[$book['owner']]);
            $lastitem->setAddedAt(new \DateTime($book['added_at']));
        }

        $allorders = [];
        foreach ($orderdata as $order) {
            $allorders[] = new Orders();
            $lastitem = $allorders[count($allorders) - 1];
            $lastitem->setReader($allusers[$order['reader']]);
            $lastitem->setDescription($alldescriptions[$order['description']]);
            $lastitem->setReservedAt(new \DateTime($order['reservedat']));
            $value = (is_null($order['book'])) ? null : $allbooks[$order['book']];
            $lastitem->setBook($value);
            $value = (is_null($order['takenat'])) ? null : new \DateTime($order['takenat']);
            $lastitem->setTakenAt($value);
            $value = (is_null($order['toreturnat'])) ? null : new \DateTime($order['toreturnat']);
            $lastitem->setToReturnAt($value);
            $value = (is_null($order['returnedat'])) ? null : new \DateTime($order['returnedat']);
            $lastitem->setReturnedAt($value);
        }

        $allitems = array_merge($alltags, $allusers, $alldescriptions, $allbooks, $allorders);
        foreach ($allitems as $item) {
            $manager->persist($item);
        }

        $manager->flush();

    }
} 