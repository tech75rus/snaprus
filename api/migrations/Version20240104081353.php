<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240104081353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Переименовал колонку image на imageOrigin';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD image_origin VARCHAR(255) NOT NULL, DROP image');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD image VARCHAR(255) DEFAULT \'path-image-project\' NOT NULL, DROP image_origin');
    }
}
