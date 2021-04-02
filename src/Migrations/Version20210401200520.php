<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210401200520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coffee DROP FOREIGN KEY FK_538529B39909C13F');
        $this->addSql('DROP INDEX UNIQ_538529B39909C13F ON coffee');
        $this->addSql('ALTER TABLE coffee DROP transport_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coffee ADD transport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coffee ADD CONSTRAINT FK_538529B39909C13F FOREIGN KEY (transport_id) REFERENCES transport (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_538529B39909C13F ON coffee (transport_id)');
    }
}
