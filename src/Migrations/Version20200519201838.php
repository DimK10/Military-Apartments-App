<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519201838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE member CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE telephone CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant ADD CONSTRAINT FK_4E59C462A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4E59C462A76ED395 ON tenant (user_id)');
        $this->addSql('ALTER TABLE user CHANGE tenant_id tenant_id INT DEFAULT NULL, CHANGE unit_id unit_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE apartment CHANGE notes notes VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE apartment CHANGE notes notes VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE member CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE telephone CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant DROP FOREIGN KEY FK_4E59C462A76ED395');
        $this->addSql('DROP INDEX UNIQ_4E59C462A76ED395 ON tenant');
        $this->addSql('ALTER TABLE tenant DROP user_id');
        $this->addSql('ALTER TABLE user CHANGE tenant_id tenant_id INT DEFAULT NULL, CHANGE unit_id unit_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
