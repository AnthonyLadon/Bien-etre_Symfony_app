<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114124412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation ManyToOne: images -> prestataire (images_photo)';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD images_photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ADDBD31E6 FOREIGN KEY (images_photo_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6ADDBD31E6 ON images (images_photo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ADDBD31E6');
        $this->addSql('DROP INDEX IDX_E01FBE6ADDBD31E6 ON images');
        $this->addSql('ALTER TABLE images DROP images_photo_id');
    }
}
