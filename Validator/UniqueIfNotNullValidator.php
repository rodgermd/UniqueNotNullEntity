<?php
/**
 * Created by PhpStorm.
 * User: rodger
 * Date: 02.12.13
 * Time: 15:00
 */

namespace Rodgermd\UniqueNotNullEntityBundle\Validator;

use Doctrine\Common\Annotations\Reader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueIfNotNullValidator extends ConstraintValidator
{
    protected $em;
    protected $reader;

    public function __construct(EntityManager $em, Reader $reader)
    {
        $this->em     = $em;
        $this->reader = $reader;
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $object     The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     */
    public function validate($object, Constraint $constraint)
    {
        $reflection = new \ReflectionClass($object);
        $repository = $this->em->getRepository(get_class($object));

        foreach ($this->getAnnotatedProperties($reflection) as $prop) {
            if ($object->getId() && $this->hasSimilar($repository, $prop->getName(), call_user_func(array($object, 'get' . ucfirst($prop->getName()))), $object->getId())) {
                $this->context->addViolationAt($prop->getName(), 'This value is already used');
            }
        }
    }

    /**
     * Checks if there is already another object with the value of property given
     * @param EntityRepository $repository
     * @param                  $field
     * @param                  $value
     * @param                  $exclude_id
     *
     * @return bool
     */
    protected function hasSimilar(EntityRepository $repository, $field, $value, $exclude_id)
    {
        return count(
            $repository->createQueryBuilder('o')
              ->where('o.' . $field . ' = :value')->setParameter('value', $value)
              ->andWhere('o.id <> :id')->setParameter('id', $exclude_id)
              ->getQuery()->getArrayResult()
        ) > 0;
    }

    /**
     * Gets annotated properties
     *
     * @param \ReflectionClass $class
     *
     * @return \ReflectionProperty[]
     */
    protected function getAnnotatedProperties(\ReflectionClass $class)
    {
        $properties = array();
        foreach ($class->getProperties() as $property) {
            if ($this->reader->getPropertyAnnotation($property, 'Site\BaseBundle\Validator\UniqueIfNotNull\UniqueProperty')) {
                $properties[] = $property;
            }
        }

        return $properties;
    }
}