<?php

namespace Usr\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UsrUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
