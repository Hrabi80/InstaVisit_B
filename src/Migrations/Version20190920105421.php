<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190920105421 extends AbstractMigration
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
        $this->addSql('CREATE TABLE vcar (id INT AUTO_INCREMENT NOT NULL, id_house_id INT NOT NULL, parking TINYINT(1) NOT NULL, garage TINYINT(1) NOT NULL, cave TINYINT(1) DEFAULT NULL, ascenceur TINYINT(1) DEFAULT NULL, etage VARCHAR(255) NOT NULL, gardienne TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_E76C1FD33B6CA980 (id_house_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A3B6CA980 FOREIGN KEY (id_house_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE vcar ADD CONSTRAINT FK_E76C1FD33B6CA980 FOREIGN KEY (id_house_id) REFERENCES to_buy (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE vcar');
    }
}
