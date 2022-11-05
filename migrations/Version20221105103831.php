<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221105103831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, duree DATETIME NOT NULL, budget DOUBLE PRECISION NOT NULL, valeur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT NOT NULL, domaine VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, annonceId INT DEFAULT NULL, ClientId INT DEFAULT NULL, UNIQUE INDEX UNIQ_EDBFD5EC60B270F0 (annonceId), UNIQUE INDEX UNIQ_EDBFD5EC136A8BE8 (ClientId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_users (id INT NOT NULL, solde DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, sub_users_id INT NOT NULL, admin_id_id INT NOT NULL, client_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, compte_depot VARCHAR(255) NOT NULL, INDEX IDX_723705D1DD1C5A64 (sub_users_id), INDEX IDX_723705D1DF6E65AD (admin_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT FK_EDBFD5EC60B270F0 FOREIGN KEY (annonceId) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT FK_EDBFD5EC136A8BE8 FOREIGN KEY (ClientId) REFERENCES client (id)');
        $this->addSql('ALTER TABLE sub_users ADD CONSTRAINT FK_F8C7C150BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1DD1C5A64 FOREIGN KEY (sub_users_id) REFERENCES sub_users (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1DF6E65AD FOREIGN KEY (admin_id_id) REFERENCES `admin` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455BF396750');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60BF396750');
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY FK_EDBFD5EC60B270F0');
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY FK_EDBFD5EC136A8BE8');
        $this->addSql('ALTER TABLE sub_users DROP FOREIGN KEY FK_F8C7C150BF396750');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1DD1C5A64');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1DF6E65AD');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE historique');
        $this->addSql('DROP TABLE sub_users');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
