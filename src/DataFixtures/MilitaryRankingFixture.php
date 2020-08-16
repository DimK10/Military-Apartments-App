<?php


namespace App\DataFixtures;


use App\Entity\MilitaryRanking;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MilitaryRankingFixture extends BaseFixture
{

    public function loadData(ObjectManager $manager)
    {


        $this->createMany(14, 'ranks', function ($i) {
            $ranksInGreek = [
                0 => 'Ατγος',
                1 => 'Υπτγος',
                2 => 'Τξχος',
                3 => 'Σχης',
                4 => 'Ανχης',
                5 => 'Τχης',
                6 => 'Λγος',
                7 => 'Υπλγος',
                8 => 'Ανθλγος',
                9 => 'Ανθστης',
                10 => 'Αλχιας',
                11 => 'Επχίας',
                12 => 'Λχιας',
                13 => 'Δνεας'
            ];


            $rank = new MilitaryRanking();
            $rank->setRankInGreek($ranksInGreek[$i]);

            return $rank;
        });

        $manager->flush();
    }
}