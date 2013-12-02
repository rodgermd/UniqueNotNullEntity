<?php
/**
 * Created by PhpStorm.
 * User: rodger
 * Date: 02.12.13
 * Time: 17:37
 */

namespace Rodgermd\UniqueNotNullEntityBundle\Test\Classes;

use Rodgermd\UniqueNotNullEntityBundle\Validator as UniqueConstraints;

/**
 * Class Entity
 * @package Rodgermd\UniqueNotNullEntityBundle\Test\Classes
 * @ORM\Entity
 * @UniqueConstraints\HasUniqueProperties
 */
class Entity {

    /**
     * @var string
     * @UniqueConstraints\UniqueProperty
     */
    public $property;

    public $not_validated_property;
} 