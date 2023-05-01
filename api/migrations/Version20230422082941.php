<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230422082941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создал отношение ManyToOne Likes to User and Likes to Work';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE likes ADD user_id INT NOT NULL, ADD work_id INT NOT NULL');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7DBB3453DB FOREIGN KEY (work_id) REFERENCES work (id)');
        $this->addSql('CREATE INDEX IDX_49CA4E7DA76ED395 ON likes (user_id)');
        $this->addSql('CREATE INDEX IDX_49CA4E7DBB3453DB ON likes (work_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7DA76ED395');
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7DBB3453DB');
        $this->addSql('DROP INDEX IDX_49CA4E7DA76ED395 ON likes');
        $this->addSql('DROP INDEX IDX_49CA4E7DBB3453DB ON likes');
        $this->addSql('ALTER TABLE likes DROP user_id, DROP work_id');
    }
}
