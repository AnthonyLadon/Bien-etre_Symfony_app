<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221217175623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creation relation OneToOne entre utilisateur et prestataire';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480B981C689 FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60A26480B981C689 ON prestataire (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480B981C689');
        $this->addSql('DROP INDEX UNIQ_60A26480B981C689 ON prestataire');
        $this->addSql('ALTER TABLE prestataire DROP utilisateur_id');
    }
}
