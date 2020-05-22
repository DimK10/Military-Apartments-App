<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200522183531 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE person_in_army (id INT AUTO_INCREMENT NOT NULL, tenant_id INT DEFAULT NULL, unit_id INT NOT NULL, scoring_id INT DEFAULT NULL, firstname VARCHAR(20) NOT NULL, surname VARCHAR(20) NOT NULL, rank VARCHAR(10) NOT NULL, specialty VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_404A3DB9033212A (tenant_id), INDEX IDX_404A3DBF8BD700D (unit_id), UNIQUE INDEX UNIQ_404A3DBDF2EDCBF (scoring_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent_rates_profile (id INT AUTO_INCREMENT NOT NULL, apartment_position_rate DOUBLE PRECISION NOT NULL, oldness_rate DOUBLE PRECISION NOT NULL, central_heating_rate DOUBLE PRECISION NOT NULL, rate_per_square_feet DOUBLE PRECISION NOT NULL, basic_rent DOUBLE PRECISION NOT NULL, floor_rate SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scoring (id INT AUTO_INCREMENT NOT NULL, is_married TINYINT(1) NOT NULL, has_num_of_children SMALLINT NOT NULL, has_relative_with_disability TINYINT(1) NOT NULL, months_waiting SMALLINT NOT NULL, months_housed SMALLINT NOT NULL, months_abroad SMALLINT NOT NULL, income VARCHAR(255) NOT NULL, score SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scoring_rates_profile (id INT AUTO_INCREMENT NOT NULL, lieutenant_general_rate SMALLINT NOT NULL, major_general_rate SMALLINT NOT NULL, brigadier_rate SMALLINT NOT NULL, lieutenant_colonel_rate SMALLINT NOT NULL, major_rate SMALLINT NOT NULL, captain_rate SMALLINT NOT NULL, lieutenant_rate SMALLINT NOT NULL, second_lieutenand_rate SMALLINT NOT NULL, warrant_officer_rate SMALLINT NOT NULL, warrant_officer_class2_rate SMALLINT NOT NULL, staff_sergeant_rate SMALLINT NOT NULL, sergeant_rate SMALLINT NOT NULL, corporal_rate SMALLINT NOT NULL, private_soldier_rate SMALLINT NOT NULL, wife_rate SMALLINT NOT NULL, first_child_rate SMALLINT NOT NULL, second_child_rate SMALLINT NOT NULL, children_studying_rate SMALLINT NOT NULL, relatives_with_disability_rate SMALLINT NOT NULL, waiting_to_be_housed_rate SMALLINT NOT NULL, months_housed_rate SMALLINT NOT NULL, months_abroad_rate SMALLINT NOT NULL, excess_income_rate SMALLINT NOT NULL, colonel_rate SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE person_in_army ADD CONSTRAINT FK_404A3DB9033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE person_in_army ADD CONSTRAINT FK_404A3DBF8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE person_in_army ADD CONSTRAINT FK_404A3DBDF2EDCBF FOREIGN KEY (scoring_id) REFERENCES scoring (id)');
        $this->addSql('ALTER TABLE apartment CHANGE military_residence_id military_residence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant DROP FOREIGN KEY FK_4E59C462A76ED395');
        $this->addSql('DROP INDEX UNIQ_4E59C462A76ED395 ON tenant');
        $this->addSql('ALTER TABLE tenant DROP user_id, DROP score');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499033212A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F8BD700D');
        $this->addSql('DROP INDEX UNIQ_8D93D6499033212A ON user');
        $this->addSql('DROP INDEX IDX_8D93D649F8BD700D ON user');
        $this->addSql('ALTER TABLE user ADD person_in_army_id INT NOT NULL, DROP tenant_id, DROP unit_id, DROP first_name, DROP last_name, DROP rank, DROP specialty');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64965DA34D6 FOREIGN KEY (person_in_army_id) REFERENCES person_in_army (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64965DA34D6 ON user (person_in_army_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64965DA34D6');
        $this->addSql('ALTER TABLE person_in_army DROP FOREIGN KEY FK_404A3DBDF2EDCBF');
        $this->addSql('DROP TABLE person_in_army');
        $this->addSql('DROP TABLE rent_rates_profile');
        $this->addSql('DROP TABLE scoring');
        $this->addSql('DROP TABLE scoring_rates_profile');
        $this->addSql('ALTER TABLE apartment CHANGE military_residence_id military_residence_id INT NOT NULL');
        $this->addSql('ALTER TABLE tenant ADD user_id INT DEFAULT NULL, ADD score INT NOT NULL');
        $this->addSql('ALTER TABLE tenant ADD CONSTRAINT FK_4E59C462A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4E59C462A76ED395 ON tenant (user_id)');
        $this->addSql('DROP INDEX IDX_8D93D64965DA34D6 ON user');
        $this->addSql('ALTER TABLE user ADD tenant_id INT DEFAULT NULL, ADD unit_id INT DEFAULT NULL, ADD first_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD last_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD rank VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD specialty VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP person_in_army_id');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6499033212A ON user (tenant_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F8BD700D ON user (unit_id)');
    }
}
