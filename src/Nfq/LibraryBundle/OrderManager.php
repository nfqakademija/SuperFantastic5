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
            AND o.returnedAt IS NULL");

        return $query->getResult();
    }

} 