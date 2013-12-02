UniqueNotNullEntity
===================

Validates the entity if properties are unique if it is not null

Install
-------

composer.json:

~~~
"rodgermd/uniqueentitynotnull-bundle": "dev-master"
~~~

AppKernel.php:

~~~
new Rodgermd\UniqueNotNullEntityBundle\RodgermdUniqueNotNullEntityBundle(),
~~~


Usage
-----

~~~~~
use Rodgermd\UniqueNotNullEntityBundle\Validator as UniqueConstraints; # include namespace shortcut

/**
 * @ORM\Entity
 * @UniqueConstraints\HasUniqueProperties; # defines the class has properties to check, required to start validation
 */
class Entity {

  /**
   * @UniqueConstraints\UniqueProperty(message="Not unique property") # property to be validated
   */
  protected $property;
}
