<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124120322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL,
                           title VARCHAR(255) NOT NULL,
                           text LONGTEXT NOT NULL,
                           slug VARCHAR(255) NOT NULL,
                           created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
                           updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\',
                           UNIQUE INDEX UNIQ_3BAE0AA7989D9B62 (slug),
                           PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL,
                           email VARCHAR(180) NOT NULL,
                           roles JSON NOT NULL COMMENT \'(DC2Type:json)\',
                           password VARCHAR(255) NOT NULL,
                           UNIQUE INDEX UNIQ_8D93D649E7927C74 (email),
                           PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql("INSERT INTO user (email, roles, password)
                           VALUES ('user@gmail.com',
                                   '[\"ROLE_ADMIN\"]',
                                   '$2y$13$2MmZwk.QRjilk7A8OJJZeOfIVWkZ7b7WMoz6AEOarjCRSFgMvtbAO')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE user');
    }
}
