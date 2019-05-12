<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190511235120 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entreprise ADD leader_id INT NOT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA6073154ED4 FOREIGN KEY (leader_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA6073154ED4 ON entreprise (leader_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA6073154ED4');
        $this->addSql('DROP INDEX UNIQ_D19FA6073154ED4 ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP leader_id');
    }
}
