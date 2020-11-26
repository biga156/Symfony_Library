<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201125102541 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loan_livre (loan_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_FBDA57C6CE73868F (loan_id), INDEX IDX_FBDA57C637D925CB (livre_id), PRIMARY KEY(loan_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loan_cdrom (loan_id INT NOT NULL, cdrom_id INT NOT NULL, INDEX IDX_7D5E5438CE73868F (loan_id), INDEX IDX_7D5E5438497B6F6D (cdrom_id), PRIMARY KEY(loan_id, cdrom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loan_livre ADD CONSTRAINT FK_FBDA57C6CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_livre ADD CONSTRAINT FK_FBDA57C637D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_cdrom ADD CONSTRAINT FK_7D5E5438CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_cdrom ADD CONSTRAINT FK_7D5E5438497B6F6D FOREIGN KEY (cdrom_id) REFERENCES cdrom (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE loan_ressource');
        $this->addSql('ALTER TABLE cdrom DROP FOREIGN KEY FK_2AE74C67CE73868F');
        $this->addSql('DROP INDEX IDX_2AE74C67CE73868F ON cdrom');
        $this->addSql('ALTER TABLE cdrom DROP loan_id');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99CE73868F');
        $this->addSql('DROP INDEX IDX_AC634F99CE73868F ON livre');
        $this->addSql('ALTER TABLE livre DROP loan_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loan_ressource (loan_id INT NOT NULL, ressource_id INT NOT NULL, INDEX IDX_D2CC79DECE73868F (loan_id), INDEX IDX_D2CC79DEFC6CD52A (ressource_id), PRIMARY KEY(loan_id, ressource_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE loan_ressource ADD CONSTRAINT FK_D2CC79DECE73868F FOREIGN KEY (loan_id) REFERENCES loan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loan_ressource ADD CONSTRAINT FK_D2CC79DEFC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE loan_livre');
        $this->addSql('DROP TABLE loan_cdrom');
        $this->addSql('ALTER TABLE cdrom ADD loan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cdrom ADD CONSTRAINT FK_2AE74C67CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id)');
        $this->addSql('CREATE INDEX IDX_2AE74C67CE73868F ON cdrom (loan_id)');
        $this->addSql('ALTER TABLE livre ADD loan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id)');
        $this->addSql('CREATE INDEX IDX_AC634F99CE73868F ON livre (loan_id)');
    }
}
