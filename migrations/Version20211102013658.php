<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211102013658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE organizer ADD tourn_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organizer ADD CONSTRAINT FK_99D47173AAC2CFC0 FOREIGN KEY (tourn_id) REFERENCES tournament (id)');
        $this->addSql('CREATE INDEX IDX_99D47173AAC2CFC0 ON organizer (tourn_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE organizer DROP FOREIGN KEY FK_99D47173AAC2CFC0');
        $this->addSql('DROP INDEX IDX_99D47173AAC2CFC0 ON organizer');
        $this->addSql('ALTER TABLE organizer DROP tourn_id');
    }
}
