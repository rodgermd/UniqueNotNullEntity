<?php
/**
 * Created by PhpStorm.
 * User: rodger
 * Date: 02.12.13
 * Time: 17:37
 */

namespace Rodgermd\UniqueNotNullEntityBundle\Test\Classes;

/**
 * Class NotEntity
 */
class NotEntity {

    /**
     * @var string
     * @UniqueConstraints\UniqueProperty
     */
    protected $property;

    protected $not_validated_property;
} 