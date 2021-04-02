<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330152058 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coffee (id INT AUTO_INCREMENT NOT NULL, transport_id INT DEFAULT NULL, map_id INT DEFAULT NULL, car_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, tel INT DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, responsable VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, description2 LONGTEXT DEFAULT NULL, description3 VARCHAR(255) DEFAULT NULL, surface DOUBLE PRECISION DEFAULT NULL, places INT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, profileimage VARCHAR(255) DEFAULT NULL, coverimage VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_538529B39909C13F (transport_id), UNIQUE INDEX UNIQ_538529B353C55F64 (map_id), UNIQUE INDEX UNIQ_538529B3C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coffee ADD CONSTRAINT FK_538529B39909C13F FOREIGN KEY (transport_id) REFERENCES transport (id)');
        $this->addSql('ALTER TABLE coffee ADD CONSTRAINT FK_538529B353C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
        $this->addSql('ALTER TABLE coffee ADD CONSTRAINT FK_538529B3C3C6F69F FOREIGN KEY (car_id) REFERENCES vcar (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE coffee');
    }
}
