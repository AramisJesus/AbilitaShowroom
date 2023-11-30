<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231123235441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estofados ADD tabela_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE estofados ADD CONSTRAINT FK_C2F82918554FF37F FOREIGN KEY (tabela_id) REFERENCES tabela (id)');
        $this->addSql('CREATE INDEX IDX_C2F82918554FF37F ON estofados (tabela_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estofados DROP FOREIGN KEY FK_C2F82918554FF37F');
        $this->addSql('DROP INDEX IDX_C2F82918554FF37F ON estofados');
        $this->addSql('ALTER TABLE estofados DROP tabela_id');
    }
}
