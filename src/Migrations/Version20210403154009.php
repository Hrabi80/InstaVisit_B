<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210403154009 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coffe (id INT AUTO_INCREMENT NOT NULL, transport_id INT DEFAULT NULL, map_id INT DEFAULT NULL, car_id INT DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, surface VARCHAR(255) DEFAULT NULL, description VARCHAR(15000) DEFAULT NULL, description2 LONGTEXT DEFAULT NULL, description3 LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_39D0F3B19909C13F (transport_id), UNIQUE INDEX UNIQ_39D0F3B153C55F64 (map_id), UNIQUE INDEX UNIQ_39D0F3B1C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insta_culure (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, responsable VARCHAR(255) DEFAULT NULL, tel INT DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, surface INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, description2 LONGTEXT DEFAULT NULL, description3 LONGTEXT DEFAULT NULL, main VARCHAR(255) DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insta_resto (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, responsable VARCHAR(255) DEFAULT NULL, tel INT DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, surface INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, description2 LONGTEXT DEFAULT NULL, description3 LONGTEXT DEFAULT NULL, main VARCHAR(255) DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coffe ADD CONSTRAINT FK_39D0F3B19909C13F FOREIGN KEY (transport_id) REFERENCES transport (id)');
        $this->addSql('ALTER TABLE coffe ADD CONSTRAINT FK_39D0F3B153C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
        $this->addSql('ALTER TABLE coffe ADD CONSTRAINT FK_39D0F3B1C3C6F69F FOREIGN KEY (car_id) REFERENCES vcar (id)');
        $this->addSql('ALTER TABLE techn ADD insta_resto_id INT DEFAULT NULL, ADD insta_culure_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE techn ADD CONSTRAINT FK_8B376EAAC59E7B64 FOREIGN KEY (insta_resto_id) REFERENCES insta_resto (id)');
        $this->addSql('ALTER TABLE techn ADD CONSTRAINT FK_8B376EAADDA385F4 FOREIGN KEY (insta_culure_id) REFERENCES insta_culure (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8B376EAAC59E7B64 ON techn (insta_resto_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8B376EAADDA385F4 ON techn (insta_culure_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE techn DROP FOREIGN KEY FK_8B376EAADDA385F4');
        $this->addSql('ALTER TABLE techn DROP FOREIGN KEY FK_8B376EAAC59E7B64');
        $this->addSql('DROP TABLE coffe');
        $this->addSql('DROP TABLE insta_culure');
        $this->addSql('DROP TABLE insta_resto');
        $this->addSql('DROP INDEX UNIQ_8B376EAAC59E7B64 ON techn');
        $this->addSql('DROP INDEX UNIQ_8B376EAADDA385F4 ON techn');
        $this->addSql('ALTER TABLE techn DROP insta_resto_id, DROP insta_culure_id');
    }
}
