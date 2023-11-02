<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102143925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin 
            (id INT AUTO_INCREMENT NOT NULL,
             email VARCHAR(180) NOT NULL,
             roles JSON NOT NULL COMMENT \'(DC2Type:json)\',
             password VARCHAR(255) NOT NULL,
             UNIQUE INDEX UNIQ_880E0D76E7927C74 (email),
             PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // password 123
        $this->addSql("INSERT INTO admin (email, roles, password)
                           VALUES ('user@gmail.com',
                                   '[\"ROLE_ADMIN\"]',
                                   '$2y$13$2MmZwk.QRjilk7A8OJJZeOfIVWkZ7b7WMoz6AEOarjCRSFgMvtbAO')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
    }
}
