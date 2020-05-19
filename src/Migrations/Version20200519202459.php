<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519202459 extends AbstractMigration
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
        $this->addSql('ALTER TABLE tenant CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499033212A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F8BD700D');
        $this->addSql('DROP INDEX IDX_8D93D649F8BD700D ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D6499033212A ON user');
        $this->addSql('ALTER TABLE user ADD tenant VARCHAR(10) NOT NULL, ADD unit VARCHAR(10) NOT NULL, DROP tenant_id, DROP unit_id, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE apartment CHANGE notes notes VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE apartment CHANGE notes notes VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE member CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE telephone CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD tenant_id INT DEFAULT NULL, ADD unit_id INT DEFAULT NULL, DROP tenant, DROP unit, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F8BD700D ON user (unit_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6499033212A ON user (tenant_id)');
    }
}
