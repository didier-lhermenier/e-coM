<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201113102334 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion_has_type DROP FOREIGN KEY FK_17D628329D317AA9');
        $this->addSql('DROP TABLE promotion_has_type');
        $this->addSql('DROP TABLE promotion_type');
        $this->addSql('ALTER TABLE promotion ADD value NUMERIC(10, 2) NOT NULL, ADD type VARCHAR(10) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE promotion_has_type (id INT AUTO_INCREMENT NOT NULL, promotion_type_id INT NOT NULL, promotion_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, value NUMERIC(8, 2) NOT NULL, INDEX IDX_17D62832139DF194 (promotion_id), INDEX IDX_17D628329D317AA9 (promotion_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE promotion_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE promotion_has_type ADD CONSTRAINT FK_17D62832139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE promotion_has_type ADD CONSTRAINT FK_17D628329D317AA9 FOREIGN KEY (promotion_type_id) REFERENCES promotion_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE promotion DROP value, DROP type');
    }
}
