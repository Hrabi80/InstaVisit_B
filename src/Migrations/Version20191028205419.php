<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191028205419 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transport ADD house_lm_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212E2F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_66AB212E2F2B2F8F ON transport (house_lm_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY FK_66AB212E2F2B2F8F');
        $this->addSql('DROP INDEX UNIQ_66AB212E2F2B2F8F ON transport');
        $this->addSql('ALTER TABLE transport DROP house_lm_id_id');
    }
}
