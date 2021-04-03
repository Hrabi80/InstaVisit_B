<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210403172011 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coffee ADD tech_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coffee ADD CONSTRAINT FK_538529B364727BFC FOREIGN KEY (tech_id) REFERENCES techn (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_538529B364727BFC ON coffee (tech_id)');
        $this->addSql('ALTER TABLE techn ADD coffee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE techn ADD CONSTRAINT FK_8B376EAA78CD6D6E FOREIGN KEY (coffee_id) REFERENCES coffee (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8B376EAA78CD6D6E ON techn (coffee_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coffee DROP FOREIGN KEY FK_538529B364727BFC');
        $this->addSql('DROP INDEX UNIQ_538529B364727BFC ON coffee');
        $this->addSql('ALTER TABLE coffee DROP tech_id');
        $this->addSql('ALTER TABLE techn DROP FOREIGN KEY FK_8B376EAA78CD6D6E');
        $this->addSql('DROP INDEX UNIQ_8B376EAA78CD6D6E ON techn');
        $this->addSql('ALTER TABLE techn DROP coffee_id');
    }
}
