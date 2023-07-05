<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230705092711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant ADD ref_adresse_id INT DEFAULT NULL, ADD ref_formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E34B223342 FOREIGN KEY (ref_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3B6F4EEDD FOREIGN KEY (ref_formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_717E22E34B223342 ON etudiant (ref_adresse_id)');
        $this->addSql('CREATE INDEX IDX_717E22E3B6F4EEDD ON etudiant (ref_formation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E34B223342');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3B6F4EEDD');
        $this->addSql('DROP INDEX IDX_717E22E34B223342 ON etudiant');
        $this->addSql('DROP INDEX IDX_717E22E3B6F4EEDD ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP ref_adresse_id, DROP ref_formation_id');
    }
}
