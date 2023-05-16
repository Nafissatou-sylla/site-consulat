<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419113937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD numero_de_telephonene INT DEFAULT NULL, ADD date_de_naissance DATE NOT NULL, ADD lieu_de_naissance VARCHAR(50) NOT NULL, ADD pays_de_naissance VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE user DROP date_de_naissance');
        $this->addSql('ALTER TABLE user DROP lieu_de_naissance');
        $this->addSql('ALTER TABLE user DROP pays_de_naissance');
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
       // $this->addSql('ALTER TABLE user DROP numero_de_telephonene, DROP date_de_naissance, DROP lieu_de_naissance, DROP pays_de_naissance');
        $this->addSql('ALTER TABLE user ADD date_de_naissance DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD lieu_de_naissance DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD pays_de_naissance DATE DEFAULT NULL');
    }
}
