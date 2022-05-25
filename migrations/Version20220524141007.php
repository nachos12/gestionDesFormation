<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524141007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, promotion_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email_contact VARCHAR(255) NOT NULL, numero_tel VARCHAR(255) NOT NULL, INDEX IDX_6AB5B4711F42EA0A (promotion_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, organisme_id_id INT DEFAULT NULL, intitule VARCHAR(255) NOT NULL, INDEX IDX_404021BF3AB366C4 (organisme_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, numero_tel VARCHAR(255) NOT NULL, email_contact VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, fromation_id_id INT DEFAULT NULL, formateur_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_C11D7DD12BAC8AB1 (fromation_id_id), INDEX IDX_C11D7DD1A2FE286F (formateur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, promotion_id_id INT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_D044D5D41F42EA0A (promotion_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_formateur (session_id INT NOT NULL, formateur_id INT NOT NULL, INDEX IDX_AE943B45613FECDF (session_id), INDEX IDX_AE943B45155D8F51 (formateur_id), PRIMARY KEY(session_id, formateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_salle (session_id INT NOT NULL, salle_id INT NOT NULL, INDEX IDX_95EAC68A613FECDF (session_id), INDEX IDX_95EAC68ADC304035 (salle_id), PRIMARY KEY(session_id, salle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B4711F42EA0A FOREIGN KEY (promotion_id_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF3AB366C4 FOREIGN KEY (organisme_id_id) REFERENCES organisme (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD12BAC8AB1 FOREIGN KEY (fromation_id_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1A2FE286F FOREIGN KEY (formateur_id_id) REFERENCES formateur (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D41F42EA0A FOREIGN KEY (promotion_id_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE session_formateur ADD CONSTRAINT FK_AE943B45613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_formateur ADD CONSTRAINT FK_AE943B45155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_salle ADD CONSTRAINT FK_95EAC68A613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_salle ADD CONSTRAINT FK_95EAC68ADC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1A2FE286F');
        $this->addSql('ALTER TABLE session_formateur DROP FOREIGN KEY FK_AE943B45155D8F51');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD12BAC8AB1');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF3AB366C4');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B4711F42EA0A');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D41F42EA0A');
        $this->addSql('ALTER TABLE session_salle DROP FOREIGN KEY FK_95EAC68ADC304035');
        $this->addSql('ALTER TABLE session_formateur DROP FOREIGN KEY FK_AE943B45613FECDF');
        $this->addSql('ALTER TABLE session_salle DROP FOREIGN KEY FK_95EAC68A613FECDF');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE organisme');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_formateur');
        $this->addSql('DROP TABLE session_salle');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
