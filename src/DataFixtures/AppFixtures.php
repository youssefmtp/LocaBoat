<?php

namespace App\DataFixtures;


use App\Entity\Bateau;
use App\Entity\Location;
use App\Entity\Role;
use App\Entity\TypeBateau;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        /**
         * Jeu d'essaie pour les types bateaux
        */
        $idTypeBateau = new TypeBateau();
        $idTypeBateau->setLibelle('Bateau à moteur');
        $manager->persist($idTypeBateau);

        $idTypeBateau2 = new TypeBateau();
        $idTypeBateau2->setLibelle('Voilier');
        $manager->persist($idTypeBateau2);

        $idTypeBateau3 = new TypeBateau();
        $idTypeBateau3->setLibelle('Catamaran');
        $manager->persist($idTypeBateau3);

        $idTypeBateau4 = new TypeBateau();
        $idTypeBateau4->setLibelle('Semi-rigide');
        $manager->persist($idTypeBateau4);

        $idTypeBateau5 = new TypeBateau();
        $idTypeBateau5->setLibelle('Yacht');
        $manager->persist($idTypeBateau5);

        /**
         * Jeu d'essaie pour les bateaux
        */

        // Bateau à moteur
        $bateaumoteur = new Bateau();
        $bateaumoteur->setNom('Tempête Élégante');
        $bateaumoteur->setLargeur(10);
        $bateaumoteur->setLongueur(20);
        $bateaumoteur->setPrixJour(150);
        $bateaumoteur->setImg('assets/img/bateaumoteur.jpg');
        $bateaumoteur->setVille('Bonifacio');
        $bateaumoteur->setPays('Corse');
        $bateaumoteur->setDescription('Le Tempête Élégante est un bateau à moteur de luxe basé à Bonifacio, en Corse. 
        Avec une largeur de 10 mètres et une longueur de 20 mètres, ce bateau offre un espace généreux pour une expérience 
        de navigation exceptionnelle. À partir de 150 € par jour, explorez les eaux cristallines de la Corse avec style.');
        $bateaumoteur->setCategorie('Moteur');
        $bateaumoteur->setIdTypeBateau($idTypeBateau);
        $manager->persist($bateaumoteur);

        $bateaumoteur2 = new Bateau();
        $bateaumoteur2->setNom('Horizon Express');
        $bateaumoteur2->setLargeur(13);
        $bateaumoteur2->setLongueur(22.5);
        $bateaumoteur2->setPrixJour(220);
        $bateaumoteur2->setImg('assets/img/bateaumoteur1.jpg'); 
        $bateaumoteur2->setVille('Monte-Carlo');
        $bateaumoteur2->setPays('Monaco');
        $bateaumoteur2->setDescription("Découvrez l'élégance ultime à bord de l'Horizon Express. Avec une largeur imposante 
        de 13 mètres et une longueur de 22.5 mètres, ce bateau à moteur offre un confort exceptionnel. 
        Explorez les eaux exclusives de Monte-Carlo, Monaco, avec style et sophistication. 
        À partir de 220 € par jour, vivez une expérience de navigation de luxe.");
        $bateaumoteur2->setCategorie('Moteur');
        $bateaumoteur2->setIdTypeBateau($idTypeBateau);
        $manager->persist($bateaumoteur2);

        $bateaumoteur3 = new Bateau();
        $bateaumoteur3->setNom('Mirage Marin');
        $bateaumoteur3->setLargeur(13);
        $bateaumoteur3->setLongueur(25);
        $bateaumoteur3->setPrixJour(200);
        $bateaumoteur3->setImg('assets/img/bateaumoteur2.jpg');
        $bateaumoteur3->setVille('Perpignan');
        $bateaumoteur3->setPays('France');
        $bateaumoteur3->setDescription("Naviguez avec élégance à bord du Mirage Marin. Doté d'une largeur de 13 mètres et 
        d'une longueur de 25 mètres, ce bateau à moteur offre une expérience de navigation inoubliable. 
        Explorez les eaux de Perpignan, en France, dans le confort et le style. À partir de 200 € par jour, 
        le Mirage Marin promet des moments de détente et d'aventure.");
        $bateaumoteur3->setCategorie('Moteur');
        $bateaumoteur3->setIdTypeBateau($idTypeBateau);
        $manager->persist($bateaumoteur3);

        $bateaumoteur4 = new Bateau();
        $bateaumoteur4->setNom('Brise Vitesse');
        $bateaumoteur4->setLargeur(9);
        $bateaumoteur4->setLongueur(17);
        $bateaumoteur4->setPrixJour(150);
        $bateaumoteur4->setImg('assets/img/bateaumoteur3.jpg');
        $bateaumoteur4->setVille('Nice');
        $bateaumoteur4->setPays('France');
        $bateaumoteur4->setDescription("Explorez la Méditerranée à bord du Brise Vitesse. Avec une largeur de 9 mètres 
        et une longueur de 17 mètres, ce bateau à moteur vous offre une expérience de navigation rapide et élégante. 
        Basé à Nice, en France, le Brise Vitesse propose des voyages inoubliables à partir de 150 € par jour.");
        $bateaumoteur4->setCategorie('Moteur');
        $bateaumoteur4->setIdTypeBateau($idTypeBateau);
        $manager->persist($bateaumoteur4);

        $bateaumoteur5 = new Bateau();
        $bateaumoteur5->setNom('L\'Émeraude');
        $bateaumoteur5->setLargeur(9);
        $bateaumoteur5->setLongueur(19);
        $bateaumoteur5->setPrixJour(190);
        $bateaumoteur5->setImg('assets/img/bateaumoteur4.jpg');
        $bateaumoteur5->setVille('Bali');
        $bateaumoteur5->setPays('Indonésie');
        $bateaumoteur5->setDescription("Plongez dans une aventure tropicale à bord de L'Émeraude. Avec une largeur 
        de 9 mètres et une longueur de 19 mètres, ce bateau à moteur vous transporte vers les eaux cristallines de Bali, 
        en Indonésie. À partir de 190 € par jour, explorez les trésors marins avec style et confort.");
        $bateaumoteur5->setCategorie('Moteur');
        $bateaumoteur5->setIdTypeBateau($idTypeBateau);
        $manager->persist($bateaumoteur5);

        $bateaumoteur6 = new Bateau();
        $bateaumoteur6->setNom('Éclair Azur');
        $bateaumoteur6->setLargeur(10);
        $bateaumoteur6->setLongueur(30);
        $bateaumoteur6->setPrixJour(110);
        $bateaumoteur6->setImg('assets/img/bateaumoteur5.jpg');
        $bateaumoteur6->setVille('Montpellier');
        $bateaumoteur6->setPays('France');
        $bateaumoteur6->setDescription("Naviguez sous le ciel azur de la Méditerranée à bord de l'Éclair Azur. 
        Avec une largeur de 10 mètres et une longueur de 30 mètres, ce bateau à moteur offre une expérience de 
        navigation spacieuse et relaxante. Basé à Montpellier, en France, l'Éclair Azur propose des escapades 
        ensoleillées à partir de 110 € par jour.");
        $bateaumoteur6->setCategorie('Moteur');
        $bateaumoteur6->setIdTypeBateau($idTypeBateau);
        $manager->persist($bateaumoteur6);

        $bateaumoteur7 = new Bateau();
        $bateaumoteur7->setNom('Le Prestige');
        $bateaumoteur7->setLargeur(11.5);
        $bateaumoteur7->setLongueur(32);
        $bateaumoteur7->setPrixJour(260);
        $bateaumoteur7->setImg('assets/img/bateaumoteur6.jpg');
        $bateaumoteur7->setVille('Ibiza');
        $bateaumoteur7->setPays('Espagne');
        $bateaumoteur7->setDescription("Embarquez pour une aventure luxueuse à bord de 'Le Prestige'. Avec une largeur 
        de 11.5 mètres et une longueur de 32 mètres, ce bateau à moteur offre un espace raffiné et des performances 
        de haut niveau. Basé à Ibiza, en Espagne, 'Le Prestige' propose des expériences marines exceptionnelles 
        à partir de 260 € par jour.");
        $bateaumoteur7->setCategorie('Moteur');
        $bateaumoteur7->setIdTypeBateau($idTypeBateau);
        $manager->persist($bateaumoteur7);


        // Bateau à voile 
        $bateauAVoile1 = new Bateau();
        $bateauAVoile1->setNom('Brise Marine');
        $bateauAVoile1->setLargeur(10);
        $bateauAVoile1->setLongueur(25); 
        $bateauAVoile1->setPrixJour(180); 
        $bateauAVoile1->setImg('assets/img/bateauavoile.jpg');
        $bateauAVoile1->setVille('Porto Cervo');
        $bateauAVoile1->setPays('Italie');
        $bateauAVoile1->setDescription("Laissez-vous emporter par le vent à bord du Brise Marine, un voilier élégant. 
        Avec une largeur de 10 mètres et une longueur de 25 mètres, ce bateau à voile vous offre une expérience de 
        navigation paisible. Basé à Porto Cervo, en Italie, le 'Brise Marine' propose des escapades en mer à partir 
        de 180 € par jour.");
        $bateauAVoile1->setCategorie('Voile');
        $bateauAVoile1->setIdTypeBateau($idTypeBateau2);
        $manager->persist($bateauAVoile1);

        $bateauAVoile2 = new Bateau();
        $bateauAVoile2->setNom('Voile d\'Argent');
        $bateauAVoile2->setLargeur(13);
        $bateauAVoile2->setLongueur(22.5);
        $bateauAVoile2->setPrixJour(220);
        $bateauAVoile2->setImg('assets/img/bateauavoile1.jpg');
        $bateauAVoile2->setVille('Athènes');
        $bateauAVoile2->setPays('Grèce');
        $bateauAVoile2->setDescription("Voguez avec élégance à bord du Voile d'Argent au cœur d'Athènes, 
        en Grèce. Avec une largeur de 13 mètres et une longueur de 22.5 mètres, ce voilier vous offre une 
        expérience de navigation sophistiquée. À partir de 220 € par jour, Voile d'Argent 
        promet des moments mémorables en mer.");
        $bateauAVoile2->setCategorie('Voile');
        $bateauAVoile2->setIdTypeBateau($idTypeBateau2);
        $manager->persist($bateauAVoile2);

        $bateauAVoile3 = new Bateau();
        $bateauAVoile3->setNom('Vent Léger');
        $bateauAVoile3->setLargeur(13);
        $bateauAVoile3->setLongueur(28); 
        $bateauAVoile3->setPrixJour(210); 
        $bateauAVoile3->setImg('assets/img/bateauavoile2.jpg');
        $bateauAVoile3->setVille('Dubrovnik');
        $bateauAVoile3->setPays('Croatie');
        $bateauAVoile3->setDescription("Embarquez à bord du Vent Léger pour une aventure en mer au départ de Dubrovnik, 
        en Croatie. Avec une largeur de 13 mètres et une longueur de 28 mètres, ce voilier vous offre une expérience 
        de navigation raffinée. À partir de 210 € par jour, Vent Léger vous emmène à la découverte des côtes croates.");
        $bateauAVoile3->setCategorie('Voile');
        $bateauAVoile3->setIdTypeBateau($idTypeBateau2);
        $manager->persist($bateauAVoile3);

        $bateauAVoile4 = new Bateau();
        $bateauAVoile4->setNom('Le Zéphyr');
        $bateauAVoile4->setLargeur(9);
        $bateauAVoile4->setLongueur(20); 
        $bateauAVoile4->setPrixJour(160);
        $bateauAVoile4->setImg('assets/img/bateauavoile3.jpg');
        $bateauAVoile4->setVille('Calvi');
        $bateauAVoile4->setPays('Corse');
        $bateauAVoile4->setDescription("Explorez les eaux cristallines de Calvi à bord du Zéphyr, 
        un voilier élégant. Avec une largeur de 9 mètres et une longueur de 20 mètres, ce voilier 
        vous offre une expérience de navigation légère et agréable. À partir de 160 € par jour, 
        le Zéphyr vous emmène dans un voyage paisible au cœur de la Corse.");
        $bateauAVoile4->setCategorie('Voile');
        $bateauAVoile4->setIdTypeBateau($idTypeBateau2);
        $manager->persist($bateauAVoile4);

        // Catamaran
        $bateaucatamaran = new Bateau();
        $bateaucatamaran->setNom('Catamarano Luminoso');
        $bateaucatamaran->setLargeur(12);
        $bateaucatamaran->setLongueur(22);
        $bateaucatamaran->setPrixJour(190);
        $bateaucatamaran->setImg('assets/img/catamaran.jpg');
        $bateaucatamaran->setVille('Phuket');
        $bateaucatamaran->setPays('Thaïlande');
        $bateaucatamaran->setDescription("Embarquez pour une aventure luxueuse à bord du Catamarano Luminoso. 
        Avec une largeur de 12 mètres et une longueur de 22 mètres, ce catamaran offre un espace lumineux 
        et confortable pour votre voyage à Phuket, en Thaïlande. À partir de 190 € par jour, découvrez 
        les eaux exotiques de la Thaïlande avec élégance.");
        $bateaucatamaran->setCategorie('Voile');
        $bateaucatamaran->setIdTypeBateau($idTypeBateau3);
        $manager->persist($bateaucatamaran);

        $bateaucatamaran2 = new Bateau();
        $bateaucatamaran2->setNom('Vela Dual');
        $bateaucatamaran2->setLargeur(11.5);
        $bateaucatamaran2->setLongueur(23);
        $bateaucatamaran2->setPrixJour(220);
        $bateaucatamaran2->setImg('assets/img/catamaran1.jpg');
        $bateaucatamaran2->setVille('Amalfi');
        $bateaucatamaran2->setPays('Italie');
        $bateaucatamaran2->setDescription("Plongez dans une expérience de navigation exceptionnelle à 
        bord du Vela Dual. Avec une largeur de 11.5 mètres et une longueur de 23 mètres, 
        ce catamaran offre une voile double pour des aventures sans pareil à Amalfi, en Italie. 
        À partir de 220 € par jour, vivez des moments inoubliables sur les eaux méditerranéennes.");
        $bateaucatamaran2->setCategorie('Voile');
        $bateaucatamaran2->setIdTypeBateau($idTypeBateau3);
        $manager->persist($bateaucatamaran2);

        $bateaucatamaran3 = new Bateau();
        $bateaucatamaran3->setNom('Papillon de Mer');
        $bateaucatamaran3->setLargeur(13.5);
        $bateaucatamaran3->setLongueur(26.4);
        $bateaucatamaran3->setPrixJour(210);
        $bateaucatamaran3->setImg('assets/img/catamaran2.jpg');
        $bateaucatamaran3->setVille('Arcachon');
        $bateaucatamaran3->setPays('France');
        $bateaucatamaran3->setDescription("Envolez-vous sur les flots avec le Papillon de Mer, un catamaran 
        exceptionnel basé à Arcachon, en France. Avec une largeur de 13.5 mètres et une longueur de 26.4 mètres, 
        ce catamaran offre une expérience de navigation unique. À partir de 210 € par jour, découvrez les charmes 
        de la côte atlantique française.");
        $bateaucatamaran3->setCategorie('Voile');
        $bateaucatamaran3->setIdTypeBateau($idTypeBateau3);
        $manager->persist($bateaucatamaran3);

        $bateaucatamaran4 = new Bateau();
        $bateaucatamaran4->setNom('Catamaran Azur');
        $bateaucatamaran4->setLargeur(10.7);
        $bateaucatamaran4->setLongueur(19.6);
        $bateaucatamaran4->setPrixJour(290);
        $bateaucatamaran4->setImg('assets/img/catamaran3.jpg');
        $bateaucatamaran4->setVille('Cancún');
        $bateaucatamaran4->setPays('Mexique');
        $bateaucatamaran4->setDescription("Voyagez dans le luxe tropical à bord du Catamaran Azur, basé à Cancún, 
        au Mexique. Avec une largeur de 10.7 mètres et une longueur de 19.6 mètres, ce catamaran offre une expérience 
        de navigation exclusive. À partir de 290 € par jour, découvrez les eaux cristallines 
        de la Riviera Maya avec style et élégance.");
        $bateaucatamaran4->setCategorie('Voile');
        $bateaucatamaran4->setIdTypeBateau($idTypeBateau3);
        $manager->persist($bateaucatamaran4);

        $bateaucatamaran5 = new Bateau();
        $bateaucatamaran5->setNom('Voile d\'Or');
        $bateaucatamaran5->setLargeur(14);
        $bateaucatamaran5->setLongueur(30);
        $bateaucatamaran5->setPrixJour(300);
        $bateaucatamaran5->setImg('assets/img/catamaran4.jpg');
        $bateaucatamaran5->setVille('Cancún');
        $bateaucatamaran5->setPays('Mexique');
        $bateaucatamaran5->setDescription("Naviguez vers le paradis à bord du Voile d'Or, un catamaran d'exception 
        basé à Cancún, au Mexique. Avec une largeur imposante de 14 mètres et une longueur de 30 mètres, ce catamaran 
        offre une expérience de navigation luxueuse. À partir de 300 € par jour, explorez les eaux turquoises de 
        la Riviera Maya dans une ambiance de pur raffinement.");
        $bateaucatamaran5->setCategorie('Voile');
        $bateaucatamaran5->setIdTypeBateau($idTypeBateau3);
        $manager->persist($bateaucatamaran5);

        $bateaucatamaran6 = new Bateau();
        $bateaucatamaran6->setNom('Brise Enchantée');
        $bateaucatamaran6->setLargeur(12);
        $bateaucatamaran6->setLongueur(26);
        $bateaucatamaran6->setPrixJour(150);
        $bateaucatamaran6->setImg('assets/img/catamaran5.jpg');
        $bateaucatamaran6->setVille('Nice');
        $bateaucatamaran6->setPays('France');
        $bateaucatamaran6->setDescription("Vivez une évasion enchanteresse à bord du Brise Enchantée, 
        un catamaran basé à Nice, en France. Avec une largeur de 12 mètres et une longueur de 26 mètres, 
        ce catamaran offre une expérience de navigation magique. À partir de 150 € par jour, explorez 
        la Méditerranée avec style et charme.");
        $bateaucatamaran6->setCategorie('Voile');
        $bateaucatamaran6->setIdTypeBateau($idTypeBateau3);
        $manager->persist($bateaucatamaran6);

        // Semi-rigide
        $bateausemerigide = new Bateau();
        $bateausemerigide->setNom('AquaNova');
        $bateausemerigide->setLargeur(8); 
        $bateausemerigide->setLongueur(15); 
        $bateausemerigide->setPrixJour(120);
        $bateausemerigide->setImg('assets/img/bateausr.jpg');
        $bateausemerigide->setVille('Marseille');
        $bateausemerigide->setPays('France');
        $bateausemerigide->setDescription("Explorez les criques cachées de la côte méditerranéenne à bord de 
        l'AquaNova, un bateau semi-rigide basé à Marseille, en France. Avec une largeur de 8 mètres et une 
        longueur de 15 mètres, ce bateau offre une expérience de navigation agile et polyvalente. À partir 
        de 120 € par jour, vivez des aventures maritimes dynamiques.");
        $bateausemerigide->setCategorie('Moteur');
        $bateausemerigide->setIdTypeBateau($idTypeBateau4);
        $manager->persist($bateausemerigide);

        $bateausemerigide2 = new Bateau();
        $bateausemerigide2->setNom('Zodiac Nautic');
        $bateausemerigide2->setLargeur(9.5); 
        $bateausemerigide2->setLongueur(18); 
        $bateausemerigide2->setPrixJour(140);
        $bateausemerigide2->setImg('assets/img/bateausr1.jpg');
        $bateausemerigide2->setVille('Mombasa');
        $bateausemerigide2->setPays('Kenya');
        $bateausemerigide2->setDescription("Découvrez les beautés marines de Mombasa à bord du Zodiac Nautic, 
        un bateau semi-rigide qui allie confort et aventure. Avec une largeur de 9.5 mètres et une longueur de 18 mètres, 
        ce bateau offre une expérience de navigation agile et performante. À partir de 140 € par jour, plongez 
        dans l'exploration des côtes kenyanes avec style.");
        $bateausemerigide2->setCategorie('Moteur');
        $bateausemerigide2->setIdTypeBateau($idTypeBateau4);
        $manager->persist($bateausemerigide2);

        $bateausemerigide3 = new Bateau();
        $bateausemerigide3->setNom('SwiftRider');
        $bateausemerigide3->setLargeur(8.5);
        $bateausemerigide3->setLongueur(16);
        $bateausemerigide3->setPrixJour(130);
        $bateausemerigide3->setImg('assets/img/bateausr2.jpg');
        $bateausemerigide3->setVille('La Rochelle');
        $bateausemerigide3->setPays('France');
        $bateausemerigide3->setDescription("Parcourez les eaux de La Rochelle avec agilité à bord 
        du SwiftRider, un bateau semi-rigide qui combine puissance et maniabilité. Avec une 
        largeur de 8.5 mètres et une longueur de 16 mètres, ce bateau offre une expérience de 
        navigation dynamique. À partir de 130 € par jour, découvrez les charmes de la côte 
        atlantique française avec le SwiftRider.");
        $bateausemerigide3->setCategorie('Moteur');
        $bateausemerigide3->setIdTypeBateau($idTypeBateau4);
        $manager->persist($bateausemerigide3);

        // Yacht
        $bateauyacht = new Bateau();
        $bateauyacht->setNom('Impérial Mariner');
        $bateauyacht->setLargeur(12); 
        $bateauyacht->setLongueur(25); 
        $bateauyacht->setPrixJour(300);
        $bateauyacht->setImg('assets/img/yacht.jpg');
        $bateauyacht->setVille('Mykonos');
        $bateauyacht->setPays('Grèce');
        $bateauyacht->setDescription("Voyagez dans le luxe absolu à bord de l'Impérial Mariner, 
        un yacht d'exception basé à Mykonos, en Grèce. Avec une largeur de 12 mètres et une 
        longueur de 25 mètres, ce yacht offre une expérience de navigation impériale. À partir 
        de 300 € par jour, découvrez la mer Égée avec élégance et style.");
        $bateauyacht->setCategorie('Moteur');
        $bateauyacht->setIdTypeBateau($idTypeBateau5);
        $manager->persist($bateauyacht);

        $bateauyacht1 = new Bateau();
        $bateauyacht1->setNom('Perle des Vagues');
        $bateauyacht1->setLargeur(15); 
        $bateauyacht1->setLongueur(30); 
        $bateauyacht1->setPrixJour(400);
        $bateauyacht1->setImg('assets/img/yacht1.jpg');
        $bateauyacht1->setVille('Malé');
        $bateauyacht1->setPays('Maldives');
        $bateauyacht1->setDescription("Explorez les eaux cristallines des Maldives à bord de la 
        Perle des Vagues, un yacht luxueux. Avec une largeur de 15 mètres et une longueur de 30 
        mètres, ce yacht offre une expérience de navigation exceptionnelle. À partir de 400 € 
        par jour, vivez des moments de pur émerveillement dans l'océan Indien.");
        $bateauyacht1->setCategorie('Moteur');
        $bateauyacht1->setIdTypeBateau($idTypeBateau5);
        $manager->persist($bateauyacht1);

        $bateauyacht2 = new Bateau();
        $bateauyacht2->setNom('Lusso Infinito');
        $bateauyacht2->setLargeur(10); 
        $bateauyacht2->setLongueur(22); 
        $bateauyacht2->setPrixJour(250);
        $bateauyacht2->setImg('assets/img/yacht2.jpg');
        $bateauyacht2->setVille('Praslin');
        $bateauyacht2->setPays('Seychelles');
        $bateauyacht2->setDescription("Plongez dans l'infini du luxe à bord du Lusso Infinito, 
        un yacht exceptionnel basé à Praslin, aux Seychelles. Avec une largeur de 10 mètres et une 
        longueur de 22 mètres, ce yacht offre une expérience de navigation infiniment plaisante. 
        À partir de 250 € par jour, explorez les îles paradisiaques des Seychelles avec style.");
        $bateauyacht2->setCategorie('Moteur');
        $bateauyacht2->setIdTypeBateau($idTypeBateau5);
        $manager->persist($bateauyacht2);

        $bateauyacht3 = new Bateau();
        $bateauyacht3->setNom('Dolce Vita');
        $bateauyacht3->setLargeur(11); 
        $bateauyacht3->setLongueur(24); 
        $bateauyacht3->setPrixJour(280);
        $bateauyacht3->setImg('assets/img/yacht3.jpg');
        $bateauyacht3->setVille('Portofino');
        $bateauyacht3->setPays('Italie');
        $bateauyacht3->setDescription("Vivez la Dolce Vita à bord de ce yacht éblouissant basé à 
        Portofino, en Italie. Avec une largeur de 11 mètres et une longueur de 24 mètres, 
        ce yacht offre une expérience de navigation exquise. À partir de 280 € par jour, 
        découvrez la côte italienne avec élégance.");
        $bateauyacht3->setCategorie('Moteur');
        $bateauyacht3->setIdTypeBateau($idTypeBateau5);
        $manager->persist($bateauyacht3);


        /**
         * Jeu d'essaie pour les roles
        */
        $idRole1 = new Role();
        $idRole1->setLibelle('Administrateur');
        $manager->persist($idRole1);

        $idRole2 = new Role();
        $idRole2->setLibelle('Utilisateur');
        $manager->persist($idRole2);

        /**
         * Jeu d'essaie pour les utilisateurs
        */
        $idUser1 = new User();
        $idUser1->setNom('Admin');
        $idUser1->setPrenom('Prenom');
        $idUser1->setEmail('admin@gmail.com');
        $idUser1->setMdp('$2y$10$YLxhzV/E8lDH8u4H/TzaYOl4VkR92A7IPDUHVDJ4ZWodzlBp8317q'); // mdp : azerty34
        $idUser1->setAdresse('717 Av. Jean Mermoz');
        $idUser1->setVille('Montpellier');
        $idUser1->setCp('34000');
        $idUser1->setIdRole($idRole1);
        $manager->persist($idUser1);

        $idUser2 = new User();
        $idUser2->setNom('Zidane');
        $idUser2->setPrenom('Zinedine');
        $idUser2->setEmail('zizou13@gmail.com');
        $idUser2->setMdp('$2y$10$Ui.SRqgjVF.G/ryVgCwIX.zT3LcRWgoV/ZQWrRxF2pQtji.Bz2yXy'); // mdp : azerty34
        $idUser2->setAdresse('9 cours Franklin Roosevelt');
        $idUser2->setVille('Marseille');
        $idUser2->setCp('13006');
        $idUser2->setIdRole($idRole2);
        $manager->persist($idUser2);

        $idUser3 = new User();
        $idUser3->setNom('Millet');
        $idUser3->setPrenom('Jordan');
        $idUser3->setEmail('jordan.millet@gmail.com');
        $idUser3->setMdp('$2y$10$KnTltRQHvkYgEgKWB5t.B.DSfuowS2jo1Ysul5VO30Zj.a3XH4Xz2'); // mdp : azerty34
        $idUser3->setAdresse('12 rue Goya');
        $idUser3->setVille('Tournefeuille');
        $idUser3->setCp('31170');
        $idUser3->setIdRole($idRole2);
        $manager->persist($idUser3);

        $idUser4 = new User();
        $idUser4->setNom('García');
        $idUser4->setPrenom('Elena');
        $idUser4->setEmail('elana.garcia@gmail.com');
        $idUser4->setMdp('$2y$10$jOtTOa0yeyPU/kKYMt5bU.gY4KnhI5QLjnPu4P.MjzArk5DOXqbXm'); // mdp : azerty34
        $idUser4->setAdresse('12 rue Goya');
        $idUser4->setVille('Clichy');
        $idUser4->setCp('92110');
        $idUser4->setIdRole($idRole2);
        $manager->persist($idUser4);

        $idUser5 = new User();
        $idUser5->setNom('Romano');
        $idUser5->setPrenom('Giovanni');
        $idUser5->setEmail('giovanni.romano@gmail.com');
        $idUser5->setMdp('$2y$10$86plSGkJSQcEXlHwzjV4T.qRbQxIO9pkPi2PbBZ39qDxlf6XaY.Fe'); // mdp : azerty34
        $idUser5->setAdresse('12 rue Goya');
        $idUser5->setVille('Paris');
        $idUser5->setCp('75016');
        $idUser5->setIdRole($idRole2);
        $manager->persist($idUser5);

        $idUser6 = new User();
        $idUser6->setNom('Marino');
        $idUser6->setPrenom('Antonio');
        $idUser6->setEmail('antonio.marino@gmail.com');
        $idUser6->setMdp('$2y$10$ZysbdS2ZNbZSGCmmNKNe5e/TfX3tIaMlfVM3appOOQDaEpZU/SXxi'); // mdp : azerty34
        $idUser6->setAdresse('12 rue Goya');
        $idUser6->setVille('Paris');
        $idUser6->setCp('75016');
        $idUser6->setIdRole($idRole2);
        $manager->persist($idUser6);


        /**
         * Jeu d'essaie pour les locations
        */
        $idLocation1 = new Location();
        $idLocation1->setDebutLocation(new \DateTime('2023-08-12'));
        $idLocation1->setFinLocation(new \DateTime('2023-08-16'));
        $idLocation1->setIdBateau($bateaumoteur);
        $idLocation1->setIdUser($idUser2);
        $manager->persist($idLocation1);

        $idLocation2 = new Location();
        $idLocation2->setDebutLocation(new \DateTime('2024-08-24'));
        $idLocation2->setFinLocation(new \DateTime('2024-08-29'));
        $idLocation2->setIdBateau($bateauyacht3);
        $idLocation2->setIdUser($idUser2);
        $manager->persist($idLocation2);

        $idLocation3 = new Location();
        $idLocation3->setDebutLocation(new \DateTime('2023-08-15'));
        $idLocation3->setFinLocation(new \DateTime('2023-08-20'));
        $idLocation3->setIdBateau($bateausemerigide2);
        $idLocation3->setIdUser($idUser3);
        $manager->persist($idLocation3);

        $idLocation4 = new Location();
        $idLocation4->setDebutLocation(new \DateTime('2023-08-16'));
        $idLocation4->setFinLocation(new \DateTime('2023-08-21'));
        $idLocation4->setIdBateau($bateaucatamaran5);
        $idLocation4->setIdUser($idUser4);
        $manager->persist($idLocation4);

        $idLocation5 = new Location();
        $idLocation5->setDebutLocation(new \DateTime('2023-07-17'));
        $idLocation5->setFinLocation(new \DateTime('2023-07-22'));
        $idLocation5->setIdBateau($bateauAVoile4);
        $idLocation5->setIdUser($idUser5);
        $manager->persist($idLocation5);

        $idLocation6 = new Location();
        $idLocation6->setDebutLocation(new \DateTime('2024-07-18'));
        $idLocation6->setFinLocation(new \DateTime('2024-07-23'));
        $idLocation6->setIdBateau($bateaumoteur5);
        $idLocation6->setIdUser($idUser6);
        $manager->persist($idLocation6);

        $idLocation7 = new Location();
        $idLocation7->setDebutLocation(new \DateTime('2024-06-19'));
        $idLocation7->setFinLocation(new \DateTime('2024-06-24'));
        $idLocation7->setIdBateau($bateaumoteur5);
        $idLocation7->setIdUser($idUser3);
        $manager->persist($idLocation7);

        $idLocation8 = new Location();
        $idLocation8->setDebutLocation(new \DateTime('2024-08-02'));
        $idLocation8->setFinLocation(new \DateTime('2024-08-08'));
        $idLocation8->setIdBateau($bateaucatamaran5);
        $idLocation8->setIdUser($idUser4);
        $manager->persist($idLocation8);

        $idLocation9 = new Location();
        $idLocation9->setDebutLocation(new \DateTime('2024-07-21'));
        $idLocation9->setFinLocation(new \DateTime('2024-07-26'));
        $idLocation9->setIdBateau($bateauyacht2);
        $idLocation9->setIdUser($idUser5);
        $manager->persist($idLocation9);

        $idLocation10 = new Location();
        $idLocation10->setDebutLocation(new \DateTime('2024-08-28'));
        $idLocation10->setFinLocation(new \DateTime('2024-09-03'));
        $idLocation10->setIdBateau($bateausemerigide3);
        $idLocation10->setIdUser($idUser6);
        $manager->persist($idLocation10);

        $idLocation11 = new Location();
        $idLocation11->setDebutLocation(new \DateTime('2024-07-23'));
        $idLocation11->setFinLocation(new \DateTime('2024-08-01'));
        $idLocation11->setIdBateau($bateauAVoile2);
        $idLocation11->setIdUser($idUser4);
        $manager->persist($idLocation11);

        $manager->flush();
    }
}


