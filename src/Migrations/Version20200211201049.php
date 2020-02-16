<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200211201049 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE map CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE map map VARCHAR(800) DEFAULT NULL, CHANGE virtual_tour virtual_tour VARCHAR(800) DEFAULT NULL');
        $this->addSql('ALTER TABLE to_buy ADD piece INT DEFAULT NULL, CHANGE surface surface DOUBLE PRECISION DEFAULT NULL, CHANGE mainIMG mainIMG VARCHAR(255) DEFAULT NULL, CHANGE cover cover VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cuisine CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE refri refri TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE equipement CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE boite boite TINYINT(1) DEFAULT NULL, CHANGE interphone interphone TINYINT(1) DEFAULT NULL, CHANGE lavelange lavelange TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE couchage CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE canapelit canapelit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallery CHANGE thir_cover thir_cover VARCHAR(255) DEFAULT NULL, CHANGE four_cover four_cover VARCHAR(255) DEFAULT NULL, CHANGE five_cover five_cover VARCHAR(255) DEFAULT NULL, CHANGE sex_cover sex_cover VARCHAR(255) DEFAULT NULL, CHANGE seven_cover seven_cover VARCHAR(255) DEFAULT NULL, CHANGE eight_cover eight_cover VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE for_rent ADD piece INT DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE main_img main_img VARCHAR(255) DEFAULT NULL, CHANGE cover cover VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ameublement CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE canape canape INT DEFAULT NULL, CHANGE my_tv my_tv INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transport CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE bus bus INT DEFAULT NULL, CHANGE metro metro INT DEFAULT NULL, CHANGE train train INT DEFAULT NULL, CHANGE louage louage INT DEFAULT NULL, CHANGE louage_m louage_m INT DEFAULT NULL, CHANGE bus_st bus_st VARCHAR(255) DEFAULT NULL, CHANGE metro_st metro_st VARCHAR(255) DEFAULT NULL, CHANGE train_st train_st VARCHAR(255) DEFAULT NULL, CHANGE louage_st louage_st VARCHAR(255) DEFAULT NULL, CHANGE taxi_st taxi_st VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE localisation CHANGE gover gover VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE for_rent_m ADD piece INT DEFAULT NULL, CHANGE main_img main_img VARCHAR(255) DEFAULT NULL, CHANGE cover cover VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE vcar CHANGE id_house_id id_house_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE cave cave TINYINT(1) DEFAULT NULL, CHANGE ascenceur ascenceur TINYINT(1) DEFAULT NULL, CHANGE gardienne gardienne TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ameublement CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE canape canape INT DEFAULT NULL, CHANGE my_tv my_tv INT DEFAULT NULL');
        $this->addSql('ALTER TABLE couchage CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE canapelit canapelit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cuisine CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE refri refri TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE equipement CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE boite boite TINYINT(1) DEFAULT \'NULL\', CHANGE interphone interphone TINYINT(1) DEFAULT \'NULL\', CHANGE lavelange lavelange TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE for_rent DROP piece, CHANGE city city VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE main_img main_img VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE cover cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE for_rent_m DROP piece, CHANGE main_img main_img VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE cover cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE gallery CHANGE thir_cover thir_cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE four_cover four_cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE five_cover five_cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE sex_cover sex_cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE seven_cover seven_cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE eight_cover eight_cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE localisation CHANGE gover gover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE map CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE map map VARCHAR(800) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE virtual_tour virtual_tour VARCHAR(800) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE to_buy DROP piece, CHANGE surface surface DOUBLE PRECISION DEFAULT \'NULL\', CHANGE mainIMG mainIMG VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE cover cover VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE transport CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE bus bus INT DEFAULT NULL, CHANGE metro metro INT DEFAULT NULL, CHANGE train train INT DEFAULT NULL, CHANGE louage louage INT DEFAULT NULL, CHANGE louage_m louage_m INT DEFAULT NULL, CHANGE bus_st bus_st VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE metro_st metro_st VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE train_st train_st VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE louage_st louage_st VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE taxi_st taxi_st VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE vcar CHANGE id_house_id id_house_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE cave cave TINYINT(1) DEFAULT \'NULL\', CHANGE ascenceur ascenceur TINYINT(1) DEFAULT \'NULL\', CHANGE gardienne gardienne TINYINT(1) DEFAULT \'NULL\'');
    }
}
