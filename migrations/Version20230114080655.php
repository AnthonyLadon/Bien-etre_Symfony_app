<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114080655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation OneToOne: images -> categorieService';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD categorie_service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A7395634A FOREIGN KEY (categorie_service_id) REFERENCES categorie_service (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A7395634A ON images (categorie_service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A7395634A');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A7395634A ON images');
        $this->addSql('ALTER TABLE images DROP categorie_service_id');
    }
}
