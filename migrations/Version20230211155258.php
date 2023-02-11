<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211155258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'modification Utilisateur: localité devient nullable ';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BE3DB2B7');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3BE3DB2B7 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP prestataire_id, CHANGE localite_id localite_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD prestataire_id INT DEFAULT NULL, CHANGE localite_id localite_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3BE3DB2B7 ON utilisateur (prestataire_id)');
    }
}
