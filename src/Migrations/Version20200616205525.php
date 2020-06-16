<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200616205525 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE apartment (id INT AUTO_INCREMENT NOT NULL, military_residence_id INT DEFAULT NULL, tenant_id INT DEFAULT NULL, name VARCHAR(10) NOT NULL, floor SMALLINT NOT NULL, master_bedrooms VARCHAR(3) NOT NULL, master_bedrooms_floor_type VARCHAR(10) NOT NULL, livingroom_floor_type VARCHAR(10) NOT NULL, kitchen_floor_type VARCHAR(10) NOT NULL, wc_floor_type VARCHAR(10) NOT NULL, hall_floor_type VARCHAR(10) NOT NULL, main_entrance_doors SMALLINT NOT NULL, interior_doors SMALLINT NOT NULL, balcony_doors SMALLINT NOT NULL, wc_windows SMALLINT NOT NULL, kitchen_windows SMALLINT NOT NULL, electric_panels SMALLINT NOT NULL, electric_sockets SMALLINT NOT NULL, bath_heaters SMALLINT NOT NULL, kitchen_absorbers SMALLINT NOT NULL, telephone_sockets SMALLINT NOT NULL, tv_sockets SMALLINT NOT NULL, kitchen_heaters SMALLINT NOT NULL, toilets SMALLINT NOT NULL, faucet_batteries SMALLINT NOT NULL, faucets SMALLINT NOT NULL, double_sinks SMALLINT NOT NULL, kitchen_cabinets SMALLINT NOT NULL, kitchen_drawers SMALLINT NOT NULL, toile_rims_with_seats SMALLINT NOT NULL, bathtubs SMALLINT NOT NULL, bath_sinks SMALLINT NOT NULL, shelves_with_mirror SMALLINT NOT NULL, towel_holders SMALLINT NOT NULL, paper_holders SMALLINT NOT NULL, soap_holders SMALLINT NOT NULL, sponge_holders SMALLINT NOT NULL, radiator_bodies SMALLINT NOT NULL, radiator_keys SMALLINT NOT NULL, wardrobes SMALLINT NOT NULL, balcony_lights SMALLINT NOT NULL, house_keys SMALLINT NOT NULL, tents SMALLINT NOT NULL, flags SMALLINT NOT NULL, notes VARCHAR(255) DEFAULT NULL, INDEX IDX_4D7E68547DB2CDFA (military_residence_id), UNIQUE INDEX UNIQ_4D7E68549033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, tenant_id INT DEFAULT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, INDEX IDX_70E4FA789033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE military_residence (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, location VARCHAR(100) NOT NULL, address VARCHAR(100) NOT NULL, floors SMALLINT NOT NULL, number_of_apartments SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_in_army (id INT AUTO_INCREMENT NOT NULL, tenant_id INT DEFAULT NULL, unit_id INT DEFAULT NULL, scoring_id INT DEFAULT NULL, firstname VARCHAR(20) NOT NULL, surname VARCHAR(20) NOT NULL, rank VARCHAR(10) NOT NULL, specialty VARCHAR(10) NOT NULL, last_housing_date DATE DEFAULT NULL, UNIQUE INDEX UNIQ_404A3DB9033212A (tenant_id), INDEX IDX_404A3DBF8BD700D (unit_id), UNIQUE INDEX UNIQ_404A3DBDF2EDCBF (scoring_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent_rates_profile (id INT AUTO_INCREMENT NOT NULL, apartment_position_rate DOUBLE PRECISION NOT NULL, oldness_rate DOUBLE PRECISION NOT NULL, central_heating_rate DOUBLE PRECISION NOT NULL, rate_per_square_feet DOUBLE PRECISION NOT NULL, basic_rent DOUBLE PRECISION NOT NULL, floor_rate SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scoring (id INT AUTO_INCREMENT NOT NULL, person_in_army_id INT DEFAULT NULL, is_married TINYINT(1) NOT NULL, has_num_of_children SMALLINT NOT NULL, has_relative_with_disability TINYINT(1) NOT NULL, months_waiting SMALLINT NOT NULL, months_housed SMALLINT NOT NULL, months_abroad SMALLINT NOT NULL, income VARCHAR(255) NOT NULL, score SMALLINT NOT NULL, exception_code SMALLINT DEFAULT NULL, UNIQUE INDEX UNIQ_7B76A2CA65DA34D6 (person_in_army_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scoring_rates_profile (id INT AUTO_INCREMENT NOT NULL, lieutenant_general_rate SMALLINT NOT NULL, major_general_rate SMALLINT NOT NULL, brigadier_rate SMALLINT NOT NULL, lieutenant_colonel_rate SMALLINT NOT NULL, major_rate SMALLINT NOT NULL, captain_rate SMALLINT NOT NULL, lieutenant_rate SMALLINT NOT NULL, second_lieutenand_rate SMALLINT NOT NULL, warrant_officer_rate SMALLINT NOT NULL, warrant_officer_class2_rate SMALLINT NOT NULL, staff_sergeant_rate SMALLINT NOT NULL, sergeant_rate SMALLINT NOT NULL, corporal_rate SMALLINT NOT NULL, private_soldier_rate SMALLINT NOT NULL, wife_rate SMALLINT NOT NULL, first_child_rate SMALLINT NOT NULL, second_child_rate SMALLINT NOT NULL, children_studying_rate SMALLINT NOT NULL, relatives_with_disability_rate SMALLINT NOT NULL, waiting_to_be_housed_rate SMALLINT NOT NULL, months_housed_rate SMALLINT NOT NULL, months_abroad_rate SMALLINT NOT NULL, excess_income_rate SMALLINT NOT NULL, colonel_rate SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone (id INT AUTO_INCREMENT NOT NULL, tenant_id INT DEFAULT NULL, number VARCHAR(20) NOT NULL, type VARCHAR(10) NOT NULL, INDEX IDX_450FF0109033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tenant (id INT AUTO_INCREMENT NOT NULL, apartment_id INT DEFAULT NULL, person_in_army_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_4E59C462176DFE85 (apartment_id), UNIQUE INDEX UNIQ_4E59C46265DA34D6 (person_in_army_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, person_in_army_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64965DA34D6 (person_in_army_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, tenant_id INT DEFAULT NULL, brand VARCHAR(30) NOT NULL, color VARCHAR(30) NOT NULL, licence_plate VARCHAR(10) NOT NULL, INDEX IDX_1B80E4869033212A (tenant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E68547DB2CDFA FOREIGN KEY (military_residence_id) REFERENCES military_residence (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E68549033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA789033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE person_in_army ADD CONSTRAINT FK_404A3DB9033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE person_in_army ADD CONSTRAINT FK_404A3DBF8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE person_in_army ADD CONSTRAINT FK_404A3DBDF2EDCBF FOREIGN KEY (scoring_id) REFERENCES scoring (id)');
        $this->addSql('ALTER TABLE scoring ADD CONSTRAINT FK_7B76A2CA65DA34D6 FOREIGN KEY (person_in_army_id) REFERENCES person_in_army (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF0109033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE tenant ADD CONSTRAINT FK_4E59C462176DFE85 FOREIGN KEY (apartment_id) REFERENCES apartment (id)');
        $this->addSql('ALTER TABLE tenant ADD CONSTRAINT FK_4E59C46265DA34D6 FOREIGN KEY (person_in_army_id) REFERENCES person_in_army (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64965DA34D6 FOREIGN KEY (person_in_army_id) REFERENCES person_in_army (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4869033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tenant DROP FOREIGN KEY FK_4E59C462176DFE85');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E68547DB2CDFA');
        $this->addSql('ALTER TABLE scoring DROP FOREIGN KEY FK_7B76A2CA65DA34D6');
        $this->addSql('ALTER TABLE tenant DROP FOREIGN KEY FK_4E59C46265DA34D6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64965DA34D6');
        $this->addSql('ALTER TABLE person_in_army DROP FOREIGN KEY FK_404A3DBDF2EDCBF');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E68549033212A');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA789033212A');
        $this->addSql('ALTER TABLE person_in_army DROP FOREIGN KEY FK_404A3DB9033212A');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF0109033212A');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4869033212A');
        $this->addSql('ALTER TABLE person_in_army DROP FOREIGN KEY FK_404A3DBF8BD700D');
        $this->addSql('DROP TABLE apartment');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE military_residence');
        $this->addSql('DROP TABLE person_in_army');
        $this->addSql('DROP TABLE rent_rates_profile');
        $this->addSql('DROP TABLE scoring');
        $this->addSql('DROP TABLE scoring_rates_profile');
        $this->addSql('DROP TABLE telephone');
        $this->addSql('DROP TABLE tenant');
        $this->addSql('DROP TABLE unit');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicle');
    }
}
