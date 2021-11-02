<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211102013216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE organizer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `table` (id INT AUTO_INCREMENT NOT NULL, org_id INT DEFAULT NULL, win VARCHAR(2) DEFAULT NULL, loose VARCHAR(2) DEFAULT NULL, set_win VARCHAR(2) DEFAULT NULL, set_lose VARCHAR(2) DEFAULT NULL, score VARCHAR(2) DEFAULT NULL, INDEX IDX_F6298F46F4837C1B (org_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `table` ADD CONSTRAINT FK_F6298F46F4837C1B FOREIGN KEY (org_id) REFERENCES organizer (id)');
        $this->addSql('ALTER TABLE team ADD organizer_id INT NOT NULL, ADD tb_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F876C4DDA FOREIGN KEY (organizer_id) REFERENCES organizer (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FC25F92B8 FOREIGN KEY (tb_id) REFERENCES `table` (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F876C4DDA ON team (organizer_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61FC25F92B8 ON team (tb_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `table` DROP FOREIGN KEY FK_F6298F46F4837C1B');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F876C4DDA');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FC25F92B8');
        $this->addSql('DROP TABLE organizer');
        $this->addSql('DROP TABLE `table`');
        $this->addSql('DROP INDEX IDX_C4E0A61F876C4DDA ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61FC25F92B8 ON team');
        $this->addSql('ALTER TABLE team DROP organizer_id, DROP tb_id');
    }
}
