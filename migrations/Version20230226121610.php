<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230226121610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Modification relation Utilisateur -> Prestataire (OneToOne)';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EE924DD2B5');
        $this->addSql('DROP INDEX IDX_E2E2D1EE924DD2B5 ON commune');
        $this->addSql('ALTER TABLE commune DROP localite_id');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FB88E14F');
        $this->addSql('DROP INDEX UNIQ_60A26480FB88E14F ON prestataire');
        $this->addSql('ALTER TABLE prestataire DROP utilisateur_id');
        $this->addSql('ALTER TABLE utilisateur ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3BE3DB2B7 ON utilisateur (prestataire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commune ADD localite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EE924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EE924DD2B5 ON commune (localite_id)');
        $this->addSql('ALTER TABLE prestataire ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60A26480FB88E14F ON prestataire (utilisateur_id)');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BE3DB2B7');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3BE3DB2B7 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP prestataire_id');
    }
}
