<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201015234152 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address_delivery (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, address VARCHAR(255) NOT NULL, address_complement VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, INDEX IDX_C90E1291A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, tva_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, image VARCHAR(255) NOT NULL, weight NUMERIC(8, 2) DEFAULT NULL, dimension VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E664D79775F (tva_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_has_property (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, category_id INT DEFAULT NULL, sub_category_id INT DEFAULT NULL, promotion_id INT DEFAULT NULL, INDEX IDX_49D8917B7294869C (article_id), INDEX IDX_49D8917B12469DE2 (category_id), INDEX IDX_49D8917BF7BFE87C (sub_category_id), INDEX IDX_49D8917B139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, document_status_id INT DEFAULT NULL, INDEX IDX_D8698A7679CF281C (document_status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_has_type (id INT AUTO_INCREMENT NOT NULL, document_type_id INT NOT NULL, document_id INT NOT NULL, created_at DATETIME NOT NULL, ref VARCHAR(255) NOT NULL, INDEX IDX_5E437D2F61232A4F (document_type_id), INDEX IDX_5E437D2FC33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_status (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galery_article (galery_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_5AF9545FDA40A005 (galery_id), INDEX IDX_5AF9545F7294869C (article_id), PRIMARY KEY(galery_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_article (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, document_id INT NOT NULL, quantity NUMERIC(10, 3) NOT NULL, price NUMERIC(10, 2) NOT NULL, tva NUMERIC(5, 2) NOT NULL, INDEX IDX_B79E8F017294869C (article_id), INDEX IDX_B79E8F01C33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion_has_type (id INT AUTO_INCREMENT NOT NULL, promotion_type_id INT NOT NULL, promotion_id INT NOT NULL, name VARCHAR(255) NOT NULL, value NUMERIC(8, 2) NOT NULL, INDEX IDX_17D628329D317AA9 (promotion_type_id), INDEX IDX_17D62832139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, quantity NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_move (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, stock_id INT NOT NULL, label_id INT NOT NULL, quantity NUMERIC(10, 2) NOT NULL, update_at DATETIME NOT NULL, INDEX IDX_F6246FBC7294869C (article_id), INDEX IDX_F6246FBCDCD6110 (stock_id), INDEX IDX_F6246FBC33B92F39 (label_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_move_label (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tva (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rate NUMERIC(5, 3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, phone VARCHAR(16) NOT NULL, address VARCHAR(255) NOT NULL, address_complement VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, birthday DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address_delivery ADD CONSTRAINT FK_C90E1291A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('ALTER TABLE article_has_property ADD CONSTRAINT FK_49D8917B7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article_has_property ADD CONSTRAINT FK_49D8917B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE article_has_property ADD CONSTRAINT FK_49D8917BF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id)');
        $this->addSql('ALTER TABLE article_has_property ADD CONSTRAINT FK_49D8917B139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7679CF281C FOREIGN KEY (document_status_id) REFERENCES document_status (id)');
        $this->addSql('ALTER TABLE document_has_type ADD CONSTRAINT FK_5E437D2F61232A4F FOREIGN KEY (document_type_id) REFERENCES document_type (id)');
        $this->addSql('ALTER TABLE document_has_type ADD CONSTRAINT FK_5E437D2FC33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE galery_article ADD CONSTRAINT FK_5AF9545FDA40A005 FOREIGN KEY (galery_id) REFERENCES galery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE galery_article ADD CONSTRAINT FK_5AF9545F7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE line_article ADD CONSTRAINT FK_B79E8F017294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE line_article ADD CONSTRAINT FK_B79E8F01C33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
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
        $this->addSql('ALTER TABLE line_article DROP FOREIGN KEY FK_B79E8F017294869C');
        $this->addSql('ALTER TABLE stock_move DROP FOREIGN KEY FK_F6246FBC7294869C');
        $this->addSql('ALTER TABLE article_has_property DROP FOREIGN KEY FK_49D8917B12469DE2');
        $this->addSql('ALTER TABLE document_has_type DROP FOREIGN KEY FK_5E437D2FC33F7837');
        $this->addSql('ALTER TABLE line_article DROP FOREIGN KEY FK_B79E8F01C33F7837');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7679CF281C');
        $this->addSql('ALTER TABLE document_has_type DROP FOREIGN KEY FK_5E437D2F61232A4F');
        $this->addSql('ALTER TABLE galery_article DROP FOREIGN KEY FK_5AF9545FDA40A005');
        $this->addSql('ALTER TABLE article_has_property DROP FOREIGN KEY FK_49D8917B139DF194');
        $this->addSql('ALTER TABLE promotion_has_type DROP FOREIGN KEY FK_17D62832139DF194');
        $this->addSql('ALTER TABLE promotion_has_type DROP FOREIGN KEY FK_17D628329D317AA9');
        $this->addSql('ALTER TABLE stock_move DROP FOREIGN KEY FK_F6246FBCDCD6110');
        $this->addSql('ALTER TABLE stock_move DROP FOREIGN KEY FK_F6246FBC33B92F39');
        $this->addSql('ALTER TABLE article_has_property DROP FOREIGN KEY FK_49D8917BF7BFE87C');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664D79775F');
        $this->addSql('ALTER TABLE address_delivery DROP FOREIGN KEY FK_C90E1291A76ED395');
        $this->addSql('DROP TABLE address_delivery');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_has_property');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_has_type');
        $this->addSql('DROP TABLE document_status');
        $this->addSql('DROP TABLE document_type');
        $this->addSql('DROP TABLE galery');
        $this->addSql('DROP TABLE galery_article');
        $this->addSql('DROP TABLE line_article');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE promotion_has_type');
        $this->addSql('DROP TABLE promotion_type');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE stock_move');
        $this->addSql('DROP TABLE stock_move_label');
        $this->addSql('DROP TABLE sub_category');
        $this->addSql('DROP TABLE tva');
        $this->addSql('DROP TABLE user');
    }
}
