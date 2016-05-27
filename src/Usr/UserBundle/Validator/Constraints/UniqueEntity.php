<?php

namespace Usr\UserBundle\Validator\Constraints;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as BaseConstraint;

/**
 * Constraint for the Unique Entity validator.
 *
 * @Annotation
 */
class UniqueEntity extends BaseConstraint
{
    public $service = 'usr.orm.validator.unique';
    public $targetClass = null;
}
