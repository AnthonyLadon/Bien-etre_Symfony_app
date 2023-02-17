<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217141559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE utilisateur CHANGE internaute_id internautes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3E40DAB31 FOREIGN KEY (internautes_id) REFERENCES internaute (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E40DAB31 ON utilisateur (internautes_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3E40DAB31');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3E40DAB31 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur CHANGE internautes_id internaute_id INT DEFAULT NULL');
    }
}
