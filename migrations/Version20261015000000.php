<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261015000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the contact messages table.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE contact_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(120) NOT NULL, first_name VARCHAR(120) NOT NULL, address VARCHAR(255) DEFAULT NULL, telephone VARCHAR(40) DEFAULT NULL, email VARCHAR(180) NOT NULL, message CLOB NOT NULL, created_at DATETIME NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE contact_messages');
    }
}