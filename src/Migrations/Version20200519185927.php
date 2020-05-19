<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519185927 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE military_residence (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, location VARCHAR(100) NOT NULL, address VARCHAR(100) NOT NULL, floors SMALLINT NOT NULL, number_of_apartments SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, tenant_id INT NOT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, INDEX IDX_70E4FA789033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone (id INT AUTO_INCREMENT NOT NULL, tenant_id INT NOT NULL, number VARCHAR(20) NOT NULL, type VARCHAR(10) NOT NULL, INDEX IDX_450FF0109033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, tenant_id INT NOT NULL, brand VARCHAR(30) NOT NULL, color VARCHAR(30) NOT NULL, licence_plate VARCHAR(10) NOT NULL, INDEX IDX_1B80E4869033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tenant (id INT AUTO_INCREMENT NOT NULL, score INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apartment (id INT AUTO_INCREMENT NOT NULL, military_residence_id INT NOT NULL, tenant_id INT NOT NULL, name VARCHAR(10) NOT NULL, floor SMALLINT NOT NULL, master_bedrooms VARCHAR(3) NOT NULL, master_bedrooms_floor_type VARCHAR(10) NOT NULL, livingroom_floor_type VARCHAR(10) NOT NULL, kitchen_floor_type VARCHAR(10) NOT NULL, wc_floor_type VARCHAR(10) NOT NULL, hall_floor_type VARCHAR(10) NOT NULL, main_entrance_doors SMALLINT NOT NULL, interior_doors SMALLINT NOT NULL, balcony_doors SMALLINT NOT NULL, wc_windows SMALLINT NOT NULL, kitchen_windows SMALLINT NOT NULL, electric_panels SMALLINT NOT NULL, electric_sockets SMALLINT NOT NULL, bath_heaters SMALLINT NOT NULL, kitchen_absorbers SMALLINT NOT NULL, telephone_sockets SMALLINT NOT NULL, tv_sockets SMALLINT NOT NULL, kitchen_heaters SMALLINT NOT NULL, toilets SMALLINT NOT NULL, faucet_batteries SMALLINT NOT NULL, faucets SMALLINT NOT NULL, double_sinks SMALLINT NOT NULL, kitchen_cabinets SMALLINT NOT NULL, kitchen_drawers SMALLINT NOT NULL, toile_rims_with_seats SMALLINT NOT NULL, bathtubs SMALLINT NOT NULL, bath_sinks SMALLINT NOT NULL, shelves_with_mirror SMALLINT NOT NULL, towel_holders SMALLINT NOT NULL, paper_holders SMALLINT NOT NULL, soap_holders SMALLINT NOT NULL, sponge_holders SMALLINT NOT NULL, radiator_bodies SMALLINT NOT NULL, radiator_keys SMALLINT NOT NULL, wardrobes SMALLINT NOT NULL, balcony_lights SMALLINT NOT NULL, house_keys SMALLINT NOT NULL, tents SMALLINT NOT NULL, flags SMALLINT NOT NULL, notes VARCHAR(255) DEFAULT NULL, INDEX IDX_4D7E68547DB2CDFA (military_residence_id), UNIQUE INDEX UNIQ_4D7E68549033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA789033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF0109033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4869033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E68547DB2CDFA FOREIGN KEY (military_residence_id) REFERENCES military_residence (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E68549033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE user ADD tenant_id_id INT DEFAULT NULL, ADD unit_id_id INT NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD rank VARCHAR(20) NOT NULL, ADD specialty VARCHAR(10) NOT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64960D47263 FOREIGN KEY (tenant_id_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F476E05C FOREIGN KEY (unit_id_id) REFERENCES unit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64960D47263 ON user (tenant_id_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F476E05C ON user (unit_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F476E05C');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E68547DB2CDFA');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA789033212A');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF0109033212A');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4869033212A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64960D47263');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E68549033212A');
        $this->addSql('DROP TABLE unit');
        $this->addSql('DROP TABLE military_residence');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE telephone');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE tenant');
        $this->addSql('DROP TABLE apartment');
        $this->addSql('DROP INDEX UNIQ_8D93D64960D47263 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649F476E05C ON user');
        $this->addSql('ALTER TABLE user DROP tenant_id_id, DROP unit_id_id, DROP first_name, DROP last_name, DROP rank, DROP specialty, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
