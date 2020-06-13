<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture implements DependentFixtureInterface
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function loadData(ObjectManager $manager)
    {
        $this->createMany(22, 'users', function ($i) {
            $user = new User();

            $user->setEmail(sprintf('user%d@gmail.com', $i));
            if ($i === 1) {
                $user->setRoles(["ROLE_APARTMENTS_ADMIN"]);
            } else if ($i === 2)  {
                $user->setRoles(["ROLE_BUILDING_ADMIN"]);

            }else {
                $user->setRoles([]);
            }
            $user->setPassword($this->passwordEncoder->encodePassword($user, '123456'));
            $user->setPersonInArmy($this->getRandomReference('peopleInArmy'));

            return $user;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PersonInArmyFixture::class
        ];
    }
}
