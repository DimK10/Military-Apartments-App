<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200527203722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scoring CHANGE exception_code exception_code SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE member CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE telephone CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicle CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant CHANGE apartment_id apartment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE person_in_army CHANGE tenant_id tenant_id INT DEFAULT NULL, CHANGE unit_id unit_id INT DEFAULT NULL, CHANGE scoring_id scoring_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE apartment CHANGE military_residence_id military_residence_id INT DEFAULT NULL, CHANGE tenant_id tenant_id INT DEFAULT NULL, CHANGE notes notes VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE apartment CHANGE military_residence_id military_residence_id INT DEFAULT NULL, CHANGE tenant_id tenant_id INT NOT NULL, CHANGE notes notes VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE member CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE person_in_army CHANGE tenant_id tenant_id INT DEFAULT NULL, CHANGE unit_id unit_id INT DEFAULT NULL, CHANGE scoring_id scoring_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scoring CHANGE exception_code exception_code SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE telephone CHANGE tenant_id tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant CHANGE apartment_id apartment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE vehicle CHANGE tenant_id tenant_id INT DEFAULT NULL');
    }
}