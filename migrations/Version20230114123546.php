<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114123546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'realtion OneToOne: images -> utilisateur (image_avatar)';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD image_avatar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A5EBAE044 FOREIGN KEY (image_avatar_id) REFERENCES internaute (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A5EBAE044 ON images (image_avatar_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A5EBAE044');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A5EBAE044 ON images');
        $this->addSql('ALTER TABLE images DROP image_avatar_id');
    }
}
