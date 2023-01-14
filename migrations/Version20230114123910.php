<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114123910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'realtion ManyToOne: images -> presataire (images_logo)';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD images_logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A66F20A28 FOREIGN KEY (images_logo_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A66F20A28 ON images (images_logo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A66F20A28');
        $this->addSql('DROP INDEX IDX_E01FBE6A66F20A28 ON images');
        $this->addSql('ALTER TABLE images DROP images_logo_id');
    }
}
