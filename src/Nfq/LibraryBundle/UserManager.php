<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 5/8/2015
 * Time: 17:10
 */

namespace Nfq\LibraryBundle;


class UserManager
{
    private $usr;

    public function __construct($securityContext)
    {
        $this->usr = $securityContext->getToken()->getUser();
    }

    public function getUserId()
    {
        if (strcmp($this->usr, 'anon.') == 0)
            $userId = 0;
        else
            $userId = $this->usr->getId();
        return $userId;
    }
} 