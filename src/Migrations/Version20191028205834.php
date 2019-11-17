<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191028205834 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE map ADD house_lm_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABB2F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93ADAABB2F2B2F8F ON map (house_lm_id_id)');
        $this->addSql('ALTER TABLE vcar ADD house_lm_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vcar ADD CONSTRAINT FK_E76C1FD32F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E76C1FD32F2B2F8F ON vcar (house_lm_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABB2F2B2F8F');
        $this->addSql('DROP INDEX UNIQ_93ADAABB2F2B2F8F ON map');
        $this->addSql('ALTER TABLE map DROP house_lm_id_id');
        $this->addSql('ALTER TABLE vcar DROP FOREIGN KEY FK_E76C1FD32F2B2F8F');
        $this->addSql('DROP INDEX UNIQ_E76C1FD32F2B2F8F ON vcar');
        $this->addSql('ALTER TABLE vcar DROP house_lm_id_id');
    }
}
