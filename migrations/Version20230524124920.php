<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524124920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD universite VARCHAR(100) NOT NULL, ADD formation VARCHAR(100) NOT NULL, ADD annee VARCHAR(100) NOT NULL, ADD niveau VARCHAR(100) NOT NULL, DROP université, DROP nom_de_la_formation, DROP année');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation ADD université VARCHAR(100) NOT NULL, ADD nom_de_la_formation VARCHAR(100) NOT NULL, ADD année DATE NOT NULL, DROP universite, DROP formation, DROP annee, DROP niveau');
    }
}
