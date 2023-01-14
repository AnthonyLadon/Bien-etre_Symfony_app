<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114132501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation manyToMany prestataire -> categorie_service (proposer)';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestataire_categorie_service (prestataire_id INT NOT NULL, categorie_service_id INT NOT NULL, INDEX IDX_5261E2D9BE3DB2B7 (prestataire_id), INDEX IDX_5261E2D97395634A (categorie_service_id), PRIMARY KEY(prestataire_id, categorie_service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestataire_categorie_service ADD CONSTRAINT FK_5261E2D9BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_service ADD CONSTRAINT FK_5261E2D97395634A FOREIGN KEY (categorie_service_id) REFERENCES categorie_service (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire_categorie_service DROP FOREIGN KEY FK_5261E2D9BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_categorie_service DROP FOREIGN KEY FK_5261E2D97395634A');
        $this->addSql('DROP TABLE prestataire_categorie_service');
    }
}
