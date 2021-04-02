<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191029205038 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ameublement (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, canape INT DEFAULT NULL, mytable INT NOT NULL, chaise INT NOT NULL, my_tv INT DEFAULT NULL, bureau INT NOT NULL, dressing INT NOT NULL, UNIQUE INDEX UNIQ_350B9302A4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cuisine (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, four TINYINT(1) NOT NULL, plaque TINYINT(1) NOT NULL, lave TINYINT(1) NOT NULL, congelateur TINYINT(1) NOT NULL, refri TINYINT(1) DEFAULT NULL, microonde TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_10D52C6BA4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couchage (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, lit INT NOT NULL, doublelit INT NOT NULL, canapelit INT DEFAULT NULL, UNIQUE INDEX UNIQ_6326C39EA4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, toilette TINYINT(1) NOT NULL, machine TINYINT(1) NOT NULL, internet TINYINT(1) NOT NULL, boite TINYINT(1) DEFAULT NULL, interphone TINYINT(1) DEFAULT NULL, lavelange TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_B8B4C6F3A4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ameublement ADD CONSTRAINT FK_350B9302A4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE cuisine ADD CONSTRAINT FK_10D52C6BA4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE couchage ADD CONSTRAINT FK_6326C39EA4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3A4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE vcar CHANGE id_house_id id_house_id INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ameublement');
        $this->addSql('DROP TABLE cuisine');
        $this->addSql('DROP TABLE couchage');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('ALTER TABLE vcar CHANGE id_house_id id_house_id INT DEFAULT NULL');
    }
}
