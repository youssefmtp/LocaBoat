<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240101155137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_bateau (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bateau (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, largeur FLOAT NOT NULL, longueur FLOAT NOT NULL, prix_jour FLOAT NOT NULL, img VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, pays VARCHAR(50) NOT NULL, description VARCHAR(700) NOT NULL, categorie VARCHAR(10) NOT NULL, id_type_bateau_id INT NOT NULL, INDEX IDX_bateau_typebateau (id_type_bateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (num INT AUTO_INCREMENT NOT NULL, debut_location DATETIME NOT NULL, fin_location DATETIME NOT NULL, INDEX IDX_location_bateau (id_bateau_id), id_bateau_id INT NOT NULL, id_user_id INT NOT NULL, INDEX IDX_location_user (id_user_id), PRIMARY KEY(num)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(60) NOT NULL, mdp VARCHAR(60) NOT NULL, adresse VARCHAR(200) NOT NULL, ville VARCHAR(50) NOT NULL, cp VARCHAR(5) NOT NULL, id_role_id INT NOT NULL, INDEX IDX_user_role (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau ADD CONSTRAINT FK_bateau_typebateau FOREIGN KEY (id_type_bateau_id) REFERENCES type_bateau (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_location_bateau FOREIGN KEY (id_bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_location_user FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_user_role FOREIGN KEY (id_role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bateau DROP FOREIGN KEY FK_bateau_typebateau');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_location_bateau');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_location_user');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_user_role');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE type_bateau');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
