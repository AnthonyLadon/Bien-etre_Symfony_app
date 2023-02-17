<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217083107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'modification relation image -> catégorie: ajout OnetoOne avec un champ image dans catégorie';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE categorie_service ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_service ADD CONSTRAINT FK_BE1E34703DA5256D FOREIGN KEY (image_id) REFERENCES images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE1E34703DA5256D ON categorie_service (image_id)');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A7395634A');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A7395634A ON images');
        $this->addSql('ALTER TABLE images DROP categorie_service_id');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE categorie_service DROP FOREIGN KEY FK_BE1E34703DA5256D');
        $this->addSql('DROP INDEX UNIQ_BE1E34703DA5256D ON categorie_service');
        $this->addSql('ALTER TABLE categorie_service DROP image_id');
        $this->addSql('ALTER TABLE images ADD categorie_service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A7395634A FOREIGN KEY (categorie_service_id) REFERENCES categorie_service (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A7395634A ON images (categorie_service_id)');

    }
}