<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114122701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation OneToOne internaute -> bloc';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE internaute ADD bloc_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CC5582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C8E97CC5582E9C0 ON internaute (bloc_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CC5582E9C0');
        $this->addSql('DROP INDEX UNIQ_6C8E97CC5582E9C0 ON internaute');
        $this->addSql('ALTER TABLE internaute DROP bloc_id');
    }
}
