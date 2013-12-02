<?php
/**
 * Created by PhpStorm.
 * User: rodger
 * Date: 02.12.13
 * Time: 14:58
 */

namespace Rodgermd\UniqueNotNullEntityBundle\Validator;


use Symfony\Component\Validator\Constraint;

/**
 * Class UniqueIfNotNull
 * @package Site\BaseBundle\Validator
 * @Annotation
 */
class HasUniqueIfNotNull extends Constraint
{
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy()
    {
        return 'rodgermd.validator.unique_entity_notnull';
    }
} 