<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216173816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ajout relation stage prestataire';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE stage ADD prestataire_id INT NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369BE3DB2B7 ON stage (prestataire_id)');


    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369BE3DB2B7');
        $this->addSql('DROP INDEX IDX_C27C9369BE3DB2B7 ON stage');
        $this->addSql('ALTER TABLE stage DROP prestataire_id');

    }
}
