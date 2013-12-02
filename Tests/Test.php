<?php
/**
 * Created by PhpStorm.
 * User: rodger
 * Date: 02.12.13
 * Time: 17:40
 */

namespace Rodgermd\UniqueNotNullEntityBundle\Test;

use Rodgermd\UniqueNotNullEntityBundle\Test\Classes\Entity;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Validator;

/**
 * Class Test
 * @package Rodgermd\UniqueNotNullEntityBundle\Test
 */
class Test extends WebTestCase
{
    public function testClasses()
    {

        $client = $this->createClient();
        $container = $client->getContainer();
        
        /** @var Validator $validator */
        $validator = $container->get('validator');

        $entity = new Entity();
        // test null

        $errors = $validator->validate($entity);
    }
} 