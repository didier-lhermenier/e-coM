<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006192452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, image VARCHAR(255) NOT NULL, weight NUMERIC(8, 2) DEFAULT NULL, dimension VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_has_property (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, category_id INT DEFAULT NULL, sub_category_id INT DEFAULT NULL, promotion_id INT DEFAULT NULL, INDEX IDX_49D8917B7294869C (article_id), INDEX IDX_49D8917B12469DE2 (category_id), INDEX IDX_49D8917BF7BFE87C (sub_category_id), INDEX IDX_49D8917B139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galery_article (galery_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_5AF9545FDA40A005 (galery_id), INDEX IDX_5AF9545F7294869C (article_id), PRIMARY KEY(galery_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, order_status_id INT DEFAULT NULL, order_number VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_F5299398D7707B45 (order_status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_has_article (id INT AUTO_INCREMENT NOT NULL, the_order_id INT NOT NULL, article_id INT NOT NULL, quantity NUMERIC(10, 3) NOT NULL, price NUMERIC(10, 2) NOT NULL, INDEX IDX_7E79193BC416F85B (the_order_id), INDEX IDX_7E79193B7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion_has_type (id INT AUTO_INCREMENT NOT NULL, promotion_type_id INT NOT NULL, promotion_id INT NOT NULL, name VARCHAR(255) NOT NULL, value NUMERIC(8, 2) NOT NULL, INDEX IDX_17D628329D317AA9 (promotion_type_id), INDEX IDX_17D62832139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, quantity NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_move (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, stock_id INT NOT NULL, label_id INT NOT NULL, quantity NUMERIC(10, 2) NOT NULL, update_at DATETIME NOT NULL, INDEX IDX_F6246FBC7294869C (article_id), INDEX IDX_F6246FBCDCD6110 (stock_id), INDEX IDX_F6246FBC33B92F39 (label_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_move_label (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tva (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rate NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_has_property ADD CONSTRAINT FK_49D8917B7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article_has_property ADD CONSTRAINT FK_49D8917B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE article_has_property ADD CONSTRAINT FK_49D8917BF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE article_has_property ADD CONSTRAINT FK_49D8917B139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE galery_article ADD CONSTRAINT FK_5AF9545FDA40A005 FOREIGN KEY (galery_id) REFERENCES galery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE galery_article ADD CONSTRAINT FK_5AF9545F7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398D7707B45 FOREIGN KEY (order_status_id) REFERENCES order_status (id)');
        $this->addSql('ALTER TABLE order_has_article ADD CONSTRAINT FK_7E79193BC416F85B FOREIGN KEY (the_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_has_article ADD CONSTRAINT FK_7E79193B7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE promotion_has_type ADD CONSTRAINT FK_17D628329D317AA9 FOREIGN KEY (promotion_type_id) REFERENCES promotion_type (id)');
        $this->addSql('ALTER TABLE promotion_has_type ADD CONSTRAINT FK_17D62832139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE stock_move ADD CONSTRAINT FK_F6246FBC7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE stock_move ADD CONSTRAINT FK_F6246FBCDCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE stock_move ADD CONSTRAINT FK_F6246FBC33B92F39 FOREIGN KEY (label_id) REFERENCES stock_move_label (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_has_property DROP FOREIGN KEY FK_49D8917B7294869C');
        $this->addSql('ALTER TABLE galery_article DROP FOREIGN KEY FK_5AF9545F7294869C');
        $this->addSql('ALTER TABLE order_has_article DROP FOREIGN KEY FK_7E79193B7294869C');
        $this->addSql('ALTER TABLE stock_move DROP FOREIGN KEY FK_F6246FBC7294869C');
        $this->addSql('ALTER TABLE article_has_property DROP FOREIGN KEY FK_49D8917B12469DE2');
        $this->addSql('ALTER TABLE galery_article DROP FOREIGN KEY FK_5AF9545FDA40A005');
        $this->addSql('ALTER TABLE order_has_article DROP FOREIGN KEY FK_7E79193BC416F85B');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398D7707B45');
        $this->addSql('ALTER TABLE article_has_property DROP FOREIGN KEY FK_49D8917B139DF194');
        $this->addSql('ALTER TABLE promotion_has_type DROP FOREIGN KEY FK_17D62832139DF194');
        $this->addSql('ALTER TABLE promotion_has_type DROP FOREIGN KEY FK_17D628329D317AA9');
        $this->addSql('ALTER TABLE stock_move DROP FOREIGN KEY FK_F6246FBCDCD6110');
        $this->addSql('ALTER TABLE stock_move DROP FOREIGN KEY FK_F6246FBC33B92F39');
        $this->addSql('ALTER TABLE article_has_property DROP FOREIGN KEY FK_49D8917BF7BFE87C');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_has_property');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE galery');
        $this->addSql('DROP TABLE galery_article');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_has_article');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE promotion_has_type');
        $this->addSql('DROP TABLE promotion_type');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE stock_move');
        $this->addSql('DROP TABLE stock_move_label');
        $this->addSql('DROP TABLE sub_category');
        $this->addSql('DROP TABLE tva');
    }
}
