<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240104084310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Добавил колонки bigImage, middleImage, smallImage';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD big_image VARCHAR(255) DEFAULT NULL, ADD middle_image VARCHAR(255) DEFAULT NULL, ADD small_image VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP big_image, DROP middle_image, DROP small_image, CHANGE name name VARCHAR(255) DEFAULT \'Name Project\' NOT NULL');
    }
}
