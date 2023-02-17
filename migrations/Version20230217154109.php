<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217154109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'supression relation images -> intenraute et ajout relation "image" OneToOne images -> utilisateur';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A5EBAE044');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A5EBAE044 ON images');
        $this->addSql('ALTER TABLE images CHANGE image_avatar_id image_internaute_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A8EFAFA89 FOREIGN KEY (image_internaute_id) REFERENCES internaute (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A8EFAFA89 ON images (image_internaute_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A8EFAFA89');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A8EFAFA89 ON images');
        $this->addSql('ALTER TABLE images CHANGE image_internaute_id image_avatar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A5EBAE044 FOREIGN KEY (image_avatar_id) REFERENCES internaute (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A5EBAE044 ON images (image_avatar_id)');
    }
}
