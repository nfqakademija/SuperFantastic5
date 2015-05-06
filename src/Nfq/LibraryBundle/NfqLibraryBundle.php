<?php

namespace Nfq\LibraryBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class NfqLibraryBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
