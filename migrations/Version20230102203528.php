<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230102203528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'creation table internaute';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE internaute (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, newsletter TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, utilisateur_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, site_web VARCHAR(255) DEFAULT NULL, tel INT DEFAULT NULL, tva_num INT NOT NULL, UNIQUE INDEX UNIQ_60A26480B981C689 (utilisateur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480B981C689 FOREIGN KEY (utilisateur_id_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480B981C689');
        $this->addSql('DROP TABLE internaute');
        $this->addSql('DROP TABLE prestataire');
    }
}
