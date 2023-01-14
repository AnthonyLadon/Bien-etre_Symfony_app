<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114123010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation OneToOne: utilisateur -> internaute';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD internaute_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3CAF41882 ON utilisateur (internaute_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3CAF41882');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3CAF41882 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP internaute_id');
    }
}
