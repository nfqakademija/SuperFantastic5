<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 5/1/2015
 * Time: 17:53
 */

namespace Nfq\LibraryBundle;


use Nfq\LibraryBundle\Entity\Orders;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Count;

class OrderManager
{
    private $doctrine;

    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function addOrder($descriptionId, $userId)
    {
        $bookArray = array();

        //Get all book ids from the orders list
        $query1 = $this->doctrine->getManager()->createQuery(
            "SELECT distinct(b.id)
            FROM NfqLibraryBundle:Orders o
            JOIN o.book b
            ");
        foreach ($query1->getResult() as $books) {
            $var = (int)$books[1];
            array_push($bookArray, $var);
        }
        if (count($bookArray) < 1)
            $string = '0';
        else
            $string = implode(',', $bookArray);

        //Get a free book copy that has not been ordered yet
        $query2 = $this->doctrine->getManager()->createQuery(
            "SELECT b.id
            FROM NfqLibraryBundle:Books b
            JOIN b.description d
            WHERE d.id = " . $descriptionId . "
            AND b.id NOT IN
            (" . $string . ")");

        //Get a free book copy from books that have already been returned
        $query3 = $this->doctrine->getManager()->createQuery(
            "SELECT b.id
            FROM NfqLibraryBundle:Orders o
            JOIN o.book b
            JOIN o.description d
            WHERE d.id =" . $descriptionId);

        if (count($query2->getResult()) > 0)
            $bookId = $query2->setMaxResults(1)->getResult()[0];
        else
            $bookId = $query3->setMaxResults(1)->getResult()[0];

        $reservedAt = new \DateTime('now');
        $takenAt = new \DateTime('now');

        $toReturnAt = new \DateTime(date('Y-m-d', strtotime("+30 days")));
        $user = $this->doctrine->getManager()->getRepository('NfqLibraryBundle:Users')->find($userId);
        $book = $this->doctrine->getManager()->getRepository('NfqLibraryBundle:Books')->find($bookId);
        $description = $this->doctrine->getManager()->getRepository('NfqLibraryBundle:Descriptions')->find($descriptionId);

        $order = new Orders();
        $order->setReader($user);
        $order->setBook($book);
        $order->setDescription($description);
        $order->setReservedAt($reservedAt);
        $order->setTakenAt($takenAt);
        $order->setToReturnAt($toReturnAt);

        //check if an order like this doesn't exist already
        $query = $this->doctrine->getManager()->createQuery(
            "SELECT count(o.id)
            FROM NfqLibraryBundle:Orders o
            JOIN o.reader r
            JOIN o.description d
            WHERE o.returnedAt is null
            AND d.id =" . $descriptionId . "
            AND r.id = " . $userId);

        $em = $this->doctrine->getManager();

        if ($query->getResult()[0][1] <= 0) {
            $em->persist($order);
            $em->flush();

            return $order->getId();
        } else
            return 0;
    }

    //add a reservation
    public function addReservation($descriptionId, $userId)
    {
        //check if a reservation like this doesn't exist already
        $query = $this->doctrine->getManager()->createQuery(
            "SELECT count(o.id)
            FROM NfqLibraryBundle:Orders o
            JOIN o.reader r
            JOIN o.description d
            WHERE o.returnedAt is null
            AND d.id =" . $descriptionId . "
            AND r.id = " . $userId);
        $user = $this->doctrine->getManager()->getRepository('NfqLibraryBundle:Users')->find($userId);
        $description = $this->doctrine->getManager()->getRepository('NfqLibraryBundle:Descriptions')->find($descriptionId);

        $reservation = new Orders();
        $reservation->setDescription($description);
        $reservation->setReader($user);
        $reservation->setReservedAt(new \DateTime('now'));

        $em = $this->doctrine->getManager();

        if ($query->getResult()[0][1] <= 0) {
            $em->persist($reservation);
            $em->flush();

            return $reservation->getId();
        } else
            return 0;
    }

    //get all orders/reservations that haven't been returned by the user yet
    public function getOrders($userId)
    {
        $query = $this->doctrine->getManager()->createQuery(
            "SELECT d.author, d.title, d.coverUrl, o.reservedAt, o.takenAt, o.toReturnAt
            FROM NfqLibraryBundle:Orders o
            JOIN o.reader r
            JOIN o.description d
            WHERE r.id =" . $userId . "
            AND o.returnedAt IS NULL
            ORDER BY o.toReturnAt");

        return $query->getResult();
    }

    public function getUnreturnedOrders()
    {
        $query = $this->doctrine->getManager()->createQuery(
            "SELECT o.id, o.toReturnAt, r.firstname, r.lastname, d.author, d.title, d.coverUrl
            FROM NfqLibraryBundle:Orders o
            JOIN o.reader r
            JOIN o.description d
            WHERE o.returnedAt IS NULL
            AND o.takenAt IS NOT NULL
            ORDER BY o.id");
        return $query->getResult();
    }

    public function getFreeBooksAmount($id)
    {
        $booksQuery = $this->doctrine->getManager()->createQuery(
            "SELECT COUNT(b.id)
            FROM NfqLibraryBundle:Books b
            JOIN b.description d
            WHERE d.id = " . $id);

        $takenBooksQuery = $this->doctrine->getManager()->createQuery(
            "SELECT COUNT(o.id)
            FROM NfqLibraryBundle:Orders o
            JOIN o.description d
            WHERE o.returnedAt is null
            AND o.takenAt is not null
            AND d.id = " . $id);

        $takenBooks = $takenBooksQuery->getResult();
        $totalBooks = $booksQuery->getResult();
        $freeBooks = $totalBooks[0][1] - $takenBooks[0][1];
        return $freeBooks;
    }

    /*
     * set the given order as returned, and if there are any reservations
     * for that description id, set the first one as taken
     */
    public function setOrderReturned($orderId, $mailer)
    {
        $em = $this->doctrine->getManager();
        $order = $em->getRepository('NfqLibraryBundle:Orders')->find($orderId);
        $order->setReturnedAt(new \DateTime('now'));
        $reservationId = $this->getReservation($order->getDescriptionId());
        if ($reservationId > 0) {
            $order = $em->getRepository('NfqLibraryBundle:Orders')->find($reservationId);
            $order->setTakenAt(new \DateTime('now'));
            $order->setToReturnAt(new \DateTime(date('Y-m-d', strtotime("+30 days"))));
            $this->sendEmail($order->getReader(), $order->getDescription(), $mailer);
        }
        $em->flush();
        return;
    }

    //Get the first untaken order (reservation) id for given description id
    public function getReservation($descriptionId)
    {
        $reservedBooksQuery = $this->doctrine->getManager()->createQuery(
            "SELECT o.id
            FROM NfqLibraryBundle:Orders o
            JOIN o.description d
            WHERE o.takenAt is null
            AND d.id = " . $descriptionId);
        $result = $reservedBooksQuery->getResult();
        if (count($result) > 0)
            return $result[0];
        else
            return 0;
    }

    public function sendEmail($user, $book, $mailer)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Your order is ready')
            ->setFrom('super5lib@gmail.com')
            ->setTo($user->getEmail())
            ->setBody('Hi, ' . trim($user->getFirstName()) . PHP_EOL . '
            Your order for the book ' . $book->getTitle() . ' is ready. Please come by to pick it up' . PHP_EOL . '
            SuperFantastic5 library.');
        $mailer->send($message);
    }
}

