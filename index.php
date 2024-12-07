<?php

spl_autoload_register(function ($class_name) {
    require "classes/" . $class_name . '.php';
});

$texte = "";

$titulaire1 = new Titulaire("RUFFO", "Yofer", "1990-07-01", "Venezuela");
$titulaire2 = new Titulaire("GONZALEZ", "Sabby", "2004-03-24", "USA");
$titulaire3 = new Titulaire("PEUPLU", "Jean", "2000-05-31", "Espagne");


$compteBancaire1 = new CompteBancaire (123, "Compte courant", 100, "Dollars", $titulaire1);
$compteBancaire2 = new CompteBancaire (456, "Livret A", 200, "Dollars", $titulaire1);
$compteBancaire3 = new CompteBancaire (789, "Compte courant", 300, "Euros",$titulaire1);
$compteBancaire4 = new CompteBancaire (321, "Compte courant", 500, "Euros", $titulaire2);
$compteBancaire5 = new CompteBancaire (987, "Livret A", 200, "Bolivars", $titulaire3);

$texte = "<br>----------------Info of 1 account from 1 owner------------------------------<br>";
echo $texte;

echo $titulaire1->getInfosUnCompte(789);

$texte = "<br>------------------Several accounts from 1 owner-----------------------------<br>";
echo $texte;

echo $titulaire1->getInfosComptes();

$texte = "<br>-----------ALL information from 1 owner--------------------------------------<br>";
echo $texte;

echo $titulaire1->afficherInfos();

$texte = "<br>-----------Add or withdraw money from 1 account--------------------------------------<br>";
echo $texte;
echo $compteBancaire1->getSoldeInitial();
echo "<br>";
echo $compteBancaire1->addMoney(50);
echo $compteBancaire1->withdrawMoney(125);
echo $compteBancaire1->withdrawMoney(26);

$texte = "<br>-----------Transfer from 1 account to another--------------------------------------<br>";
echo $texte;

echo "Solde actuel compte 2: ";
echo $compteBancaire2->getSoldeInitial();
echo "<br>Solde actuel compte 3: ";
echo $compteBancaire3->getSoldeInitial();
echo "<br>";
echo $compteBancaire2->transfer($compteBancaire3, 100);
echo "solde actuel compte 2: ";
echo $compteBancaire2->getSoldeInitial();
echo "<br>solde actuel compte 3: ";
echo $compteBancaire3->getSoldeInitial();

