<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519203417 extends AbstractMigration
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
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, tenant_id INT DEFAULT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, INDEX IDX_70E4FA789033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone (id INT AUTO_INCREMENT NOT NULL, tenant_id INT DEFAULT NULL, number VARCHAR(20) NOT NULL, type VARCHAR(10) NOT NULL, INDEX IDX_450FF0109033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, tenant_id INT NOT NULL, brand VARCHAR(30) NOT NULL, color VARCHAR(30) NOT NULL, licence_plate VARCHAR(10) NOT NULL, INDEX IDX_1B80E4869033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tenant (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, score INT NOT NULL, UNIQUE INDEX UNIQ_4E59C462A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, tenant_id INT DEFAULT NULL, unit_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, rank VARCHAR(20) NOT NULL, specialty VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6499033212A (tenant_id), INDEX IDX_8D93D649F8BD700D (unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apartment (id INT AUTO_INCREMENT NOT NULL, military_residence_id INT NOT NULL, tenant_id INT NOT NULL, name VARCHAR(10) NOT NULL, floor SMALLINT NOT NULL, master_bedrooms VARCHAR(3) NOT NULL, master_bedrooms_floor_type VARCHAR(10) NOT NULL, livingroom_floor_type VARCHAR(10) NOT NULL, kitchen_floor_type VARCHAR(10) NOT NULL, wc_floor_type VARCHAR(10) NOT NULL, hall_floor_type VARCHAR(10) NOT NULL, main_entrance_doors SMALLINT NOT NULL, interior_doors SMALLINT NOT NULL, balcony_doors SMALLINT NOT NULL, wc_windows SMALLINT NOT NULL, kitchen_windows SMALLINT NOT NULL, electric_panels SMALLINT NOT NULL, electric_sockets SMALLINT NOT NULL, bath_heaters SMALLINT NOT NULL, kitchen_absorbers SMALLINT NOT NULL, telephone_sockets SMALLINT NOT NULL, tv_sockets SMALLINT NOT NULL, kitchen_heaters SMALLINT NOT NULL, toilets SMALLINT NOT NULL, faucet_batteries SMALLINT NOT NULL, faucets SMALLINT NOT NULL, double_sinks SMALLINT NOT NULL, kitchen_cabinets SMALLINT NOT NULL, kitchen_drawers SMALLINT NOT NULL, toile_rims_with_seats SMALLINT NOT NULL, bathtubs SMALLINT NOT NULL, bath_sinks SMALLINT NOT NULL, shelves_with_mirror SMALLINT NOT NULL, towel_holders SMALLINT NOT NULL, paper_holders SMALLINT NOT NULL, soap_holders SMALLINT NOT NULL, sponge_holders SMALLINT NOT NULL, radiator_bodies SMALLINT NOT NULL, radiator_keys SMALLINT NOT NULL, wardrobes SMALLINT NOT NULL, balcony_lights SMALLINT NOT NULL, house_keys SMALLINT NOT NULL, tents SMALLINT NOT NULL, flags SMALLINT NOT NULL, notes VARCHAR(255) DEFAULT NULL, INDEX IDX_4D7E68547DB2CDFA (military_residence_id), UNIQUE INDEX UNIQ_4D7E68549033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA789033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF0109033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4869033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE tenant ADD CONSTRAINT FK_4E59C462A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E68547DB2CDFA FOREIGN KEY (military_residence_id) REFERENCES military_residence (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E68549033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F8BD700D');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E68547DB2CDFA');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA789033212A');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF0109033212A');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4869033212A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499033212A');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E68549033212A');
        $this->addSql('ALTER TABLE tenant DROP FOREIGN KEY FK_4E59C462A76ED395');
        $this->addSql('DROP TABLE unit');
        $this->addSql('DROP TABLE military_residence');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE telephone');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE tenant');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE apartment');
    }
}
