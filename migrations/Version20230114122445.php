<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114122445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation ManyToOne: Abus -> internaute';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abus ADD internaute_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abus ADD CONSTRAINT FK_72C9FD01CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        $this->addSql('CREATE INDEX IDX_72C9FD01CAF41882 ON abus (internaute_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abus DROP FOREIGN KEY FK_72C9FD01CAF41882');
        $this->addSql('DROP INDEX IDX_72C9FD01CAF41882 ON abus');
        $this->addSql('ALTER TABLE abus DROP internaute_id');
    }
}
