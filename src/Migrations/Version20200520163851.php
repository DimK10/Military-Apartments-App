<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520163851 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tenant ADD apartment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant ADD CONSTRAINT FK_4E59C462176DFE85 FOREIGN KEY (apartment_id) REFERENCES apartment (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4E59C462176DFE85 ON tenant (apartment_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tenant DROP FOREIGN KEY FK_4E59C462176DFE85');
        $this->addSql('DROP INDEX UNIQ_4E59C462176DFE85 ON tenant');
        $this->addSql('ALTER TABLE tenant DROP apartment_id');
    }
}
