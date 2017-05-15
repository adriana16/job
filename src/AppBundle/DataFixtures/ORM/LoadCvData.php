<?php

namespace AppBundle\DataFixture\ORM;

use AppBundle\Entity\Cv;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCvData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cvUser1 = new Cv();
        $cvUser1->setName('Adriana');
        $cvUser1->setWork('Symfony Developer');
        $cvUser1->setAddress('Brasov');
        $cvUser1->setEducation('Universitatea Al. I. Cuza, Iasi - Facultatea de Informatica');
        $cvUser1->setExperience('Skills gained during this work period: mysql, symfony, javascript, ajax');
        $manager->persist($cvUser1);

        $cvUser2 = new Cv();
        $cvUser2->setName('Denisa');
        $cvUser2->setWork('Senior Dev');
        $cvUser2->setAddress('Iasi');
        $cvUser2->setEducation('Facultatea de Matematica - Informatica');
        $cvUser2->setExperience('Skills gained during this work period: javascript, ajax, jquery, web designer, linux');
        $manager->persist($cvUser2);

        $cvUser3 = new Cv();
        $cvUser3->setName('Alexandru');
        $cvUser3->setWork('Java Software Engineer');
        $cvUser3->setAddress('Bucuresti');
        $cvUser3->setEducation('Facultatea de Matematica - Informatica');
        $cvUser3->setExperience('Skills gained during this work period: java, mysql, jquery, ajax, codeigniter');
        $manager->persist($cvUser3);

        $cvUser4 = new Cv();
        $cvUser4->setName('Marius');
        $cvUser4->setWork('PHP Software Engineer');
        $cvUser4->setAddress('Bucuresti');
        $cvUser4->setEducation('Facultatea de Informatica');
        $cvUser4->setExperience('Skills gained during this work period: php, mysql, symfony, javascript, ajax, html');
        $manager->persist($cvUser4);

        $cvUser5 = new Cv();
        $cvUser5->setName('Vlad');
        $cvUser5->setWork('Front End Dev');
        $cvUser5->setAddress('Bucuresti');
        $cvUser5->setEducation('Facultatea de Informatica');
        $cvUser5->setExperience('Skills gained during this work period: html, css, jquery, bootstrap');
        $manager->persist($cvUser5);

        $cvUser6 = new Cv();
        $cvUser6->setName('Andrei');
        $cvUser6->setWork('PHP Developer');
        $cvUser6->setAddress('Bucuresti');
        $cvUser6->setEducation('Facultatea de Informatica');
        $cvUser6->setExperience('Skills gained during this work period: php, mysql, symfony, javascript, ajax, web designer, html, css, jquery, java, programator, linux, codeigniter, sql');
        $manager->persist($cvUser6);

        $cvUser7 = new Cv();
        $cvUser7->setName('Andreea');
        $cvUser7->setWork('Full-Stack Dev');
        $cvUser7->setAddress('Bucuresti');
        $cvUser7->setEducation('Facultatea de Informatica');
        $cvUser7->setExperience('Skills gained during this work period: mysql,jquery, linux');
        $manager->persist($cvUser7);

        $cvUser8 = new Cv();
        $cvUser8->setName('Maria');
        $cvUser8->setWork('PHP Programmer');
        $cvUser8->setAddress('Bucuresti');
        $cvUser8->setEducation('Facultatea de Informatica');
        $cvUser8->setExperience('Skills gained during this work period: php, mysql, symfony, javascript, ajax, html, css, jquery, linux, codeigniter, sql');
        $manager->persist($cvUser8);

        $cvUser9 = new Cv();
        $cvUser9->setName('Bogdan');
        $cvUser9->setWork('Senior Symfony Developer');
        $cvUser9->setAddress('Bucuresti');
        $cvUser9->setEducation('Facultatea de Informatica');
        $cvUser9->setExperience('Skills gained during this work period: symfony, html, css, jquery, linux, git');
        $manager->persist($cvUser9);

        $manager->flush();
    }
}
