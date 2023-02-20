<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220214325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'retrait des realtions entre Localité, CodePostal, Commune';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_postal DROP FOREIGN KEY FK_CC94AC37131A4F72');
        $this->addSql('DROP INDEX IDX_CC94AC37131A4F72 ON code_postal');
        $this->addSql('ALTER TABLE code_postal DROP commune_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code_postal ADD commune_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE code_postal ADD CONSTRAINT FK_CC94AC37131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('CREATE INDEX IDX_CC94AC37131A4F72 ON code_postal (commune_id)');
    }
}
