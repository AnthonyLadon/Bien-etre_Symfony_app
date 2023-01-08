<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230108103148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'creation relation entre Utilisateur et Localité';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480B981C689');
        $this->addSql('DROP INDEX UNIQ_60A26480B981C689 ON prestataire');
        $this->addSql('ALTER TABLE prestataire CHANGE utilisateur_id utilisateur_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480B981C689 FOREIGN KEY (utilisateur_id_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60A26480B981C689 ON prestataire (utilisateur_id_id)');
        $this->addSql('ALTER TABLE utilisateur ADD localite_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3924DD2B5 ON utilisateur (localite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480B981C689');
        $this->addSql('DROP INDEX UNIQ_60A26480B981C689 ON prestataire');
        $this->addSql('ALTER TABLE prestataire CHANGE utilisateur_id_id utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480B981C689 FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60A26480B981C689 ON prestataire (utilisateur_id)');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3924DD2B5');
        $this->addSql('DROP INDEX IDX_1D1C63B3924DD2B5 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP localite_id');
    }
}
