<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200808112946 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, id_house_id INT NOT NULL, first_cover VARCHAR(255) NOT NULL, sec_cover VARCHAR(255) NOT NULL, thir_cover VARCHAR(255) DEFAULT NULL, four_cover VARCHAR(255) DEFAULT NULL, five_cover VARCHAR(255) DEFAULT NULL, sex_cover VARCHAR(255) DEFAULT NULL, seven_cover VARCHAR(255) DEFAULT NULL, eight_cover VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_472B783A3B6CA980 (id_house_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE to_buy (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, surface DOUBLE PRECISION DEFAULT NULL, description LONGTEXT NOT NULL, description2 LONGTEXT NOT NULL, description3 LONGTEXT NOT NULL, mainIMG VARCHAR(255) DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, room_nb INT NOT NULL, piece INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, gover VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE front (id INT AUTO_INCREMENT NOT NULL, newsletter VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, house_lm_id_id INT DEFAULT NULL, housenm_id INT DEFAULT NULL, bus INT DEFAULT NULL, metro INT DEFAULT NULL, train INT DEFAULT NULL, louage INT DEFAULT NULL, louage_m INT DEFAULT NULL, bus_st VARCHAR(255) DEFAULT NULL, metro_st VARCHAR(255) DEFAULT NULL, train_st VARCHAR(255) DEFAULT NULL, louage_st VARCHAR(255) DEFAULT NULL, taxi_st VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_66AB212EA4A739AF (house_id_id), UNIQUE INDEX UNIQ_66AB212E2F2B2F8F (house_lm_id_id), UNIQUE INDEX UNIQ_66AB212EB52753FC (housenm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ameublement (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, canape INT DEFAULT NULL, mytable INT NOT NULL, chaise INT NOT NULL, my_tv INT DEFAULT NULL, bureau INT NOT NULL, dressing INT NOT NULL, UNIQUE INDEX UNIQ_350B9302A4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couchage (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, lit INT NOT NULL, doublelit INT NOT NULL, canapelit INT DEFAULT NULL, UNIQUE INDEX UNIQ_6326C39EA4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE for_rent_m (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) NOT NULL, ciy VARCHAR(255) NOT NULL, surface DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION NOT NULL, room_nb INT NOT NULL, description LONGTEXT NOT NULL, description2 LONGTEXT NOT NULL, description3 LONGTEXT DEFAULT NULL, description4 LONGTEXT DEFAULT NULL, main_img VARCHAR(255) DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, piece INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE for_rent (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) DEFAULT NULL, surface INT NOT NULL, price DOUBLE PRECISION NOT NULL, room_nb INT NOT NULL, description LONGTEXT NOT NULL, description2 LONGTEXT NOT NULL, description3 LONGTEXT DEFAULT NULL, description4 LONGTEXT DEFAULT NULL, main_img VARCHAR(255) DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, piece INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vcar (id INT AUTO_INCREMENT NOT NULL, id_house_id INT DEFAULT NULL, house_lm_id_id INT DEFAULT NULL, housenm_id INT DEFAULT NULL, parking TINYINT(1) NOT NULL, garage TINYINT(1) NOT NULL, cave TINYINT(1) DEFAULT NULL, ascenceur TINYINT(1) DEFAULT NULL, etage VARCHAR(255) NOT NULL, gardienne TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_E76C1FD33B6CA980 (id_house_id), UNIQUE INDEX UNIQ_E76C1FD32F2B2F8F (house_lm_id_id), UNIQUE INDEX UNIQ_E76C1FD3B52753FC (housenm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, toilette TINYINT(1) NOT NULL, machine TINYINT(1) NOT NULL, internet TINYINT(1) NOT NULL, boite TINYINT(1) DEFAULT NULL, interphone TINYINT(1) DEFAULT NULL, lavelange TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_B8B4C6F3A4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, user_mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cuisine (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, four TINYINT(1) NOT NULL, plaque TINYINT(1) NOT NULL, lave TINYINT(1) NOT NULL, congelateur TINYINT(1) NOT NULL, refri TINYINT(1) DEFAULT NULL, microonde TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_10D52C6BA4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, house_lm_id_id INT DEFAULT NULL, housenm_id INT DEFAULT NULL, map VARCHAR(800) DEFAULT NULL, virtual_tour VARCHAR(800) DEFAULT NULL, UNIQUE INDEX UNIQ_93ADAABBA4A739AF (house_id_id), UNIQUE INDEX UNIQ_93ADAABB2F2B2F8F (house_lm_id_id), UNIQUE INDEX UNIQ_93ADAABBB52753FC (housenm_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message TINYTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A3B6CA980 FOREIGN KEY (id_house_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212EA4A739AF FOREIGN KEY (house_id_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212E2F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212EB52753FC FOREIGN KEY (housenm_id) REFERENCES for_rent (id)');
        $this->addSql('ALTER TABLE ameublement ADD CONSTRAINT FK_350B9302A4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE couchage ADD CONSTRAINT FK_6326C39EA4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE vcar ADD CONSTRAINT FK_E76C1FD33B6CA980 FOREIGN KEY (id_house_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE vcar ADD CONSTRAINT FK_E76C1FD32F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE vcar ADD CONSTRAINT FK_E76C1FD3B52753FC FOREIGN KEY (housenm_id) REFERENCES for_rent (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3A4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE cuisine ADD CONSTRAINT FK_10D52C6BA4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABBA4A739AF FOREIGN KEY (house_id_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABB2F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABBB52753FC FOREIGN KEY (housenm_id) REFERENCES for_rent (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A3B6CA980');
        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY FK_66AB212EA4A739AF');
        $this->addSql('ALTER TABLE vcar DROP FOREIGN KEY FK_E76C1FD33B6CA980');
        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABBA4A739AF');
        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY FK_66AB212E2F2B2F8F');
        $this->addSql('ALTER TABLE ameublement DROP FOREIGN KEY FK_350B9302A4A739AF');
        $this->addSql('ALTER TABLE couchage DROP FOREIGN KEY FK_6326C39EA4A739AF');
        $this->addSql('ALTER TABLE vcar DROP FOREIGN KEY FK_E76C1FD32F2B2F8F');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3A4A739AF');
        $this->addSql('ALTER TABLE cuisine DROP FOREIGN KEY FK_10D52C6BA4A739AF');
        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABB2F2B2F8F');
        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY FK_66AB212EB52753FC');
        $this->addSql('ALTER TABLE vcar DROP FOREIGN KEY FK_E76C1FD3B52753FC');
        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABBB52753FC');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE to_buy');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE front');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP TABLE ameublement');
        $this->addSql('DROP TABLE couchage');
        $this->addSql('DROP TABLE for_rent_m');
        $this->addSql('DROP TABLE for_rent');
        $this->addSql('DROP TABLE vcar');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE cuisine');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE contact');
    }
}
