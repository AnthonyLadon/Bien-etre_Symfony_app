<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114081159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'relation ManyToOne Promotion -> CategorieService';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion ADD categorie_service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD17395634A FOREIGN KEY (categorie_service_id) REFERENCES categorie_service (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD17395634A ON promotion (categorie_service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD17395634A');
        $this->addSql('DROP INDEX IDX_C11D7DD17395634A ON promotion');
        $this->addSql('ALTER TABLE promotion DROP categorie_service_id');
    }
}
