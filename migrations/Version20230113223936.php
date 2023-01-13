<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113223936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation ManyToOne: prestataire -> stage
              & relation OneToMany: utilisateur -> localite';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire DROP utilisateur_id');
        $this->addSql('ALTER TABLE stage ADD prestataire_id INT NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369BE3DB2B7 ON stage (prestataire_id)');
        $this->addSql('ALTER TABLE utilisateur ADD localite_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3924DD2B5 ON utilisateur (localite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369BE3DB2B7');
        $this->addSql('DROP INDEX IDX_C27C9369BE3DB2B7 ON stage');
        $this->addSql('ALTER TABLE stage DROP prestataire_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3924DD2B5');
        $this->addSql('DROP INDEX IDX_1D1C63B3924DD2B5 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP localite_id');
    }
}
