<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427132221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавил столбцы likes_bool, create_at, update_at для сущности Likes';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE likes ADD likes_bool TINYINT(1) NOT NULL DEFAULT 0, ADD create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\' DEFAULT CURRENT_TIMESTAMP, ADD update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\' DEFAULT CURRENT_TIMESTAMP');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE likes DROP likes_bool, DROP create_at, DROP update_at');
    }
}
