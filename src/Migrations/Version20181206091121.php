<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181206091121 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) NOT NULL, copyright VARCHAR(255) DEFAULT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_gallery (image_id INT NOT NULL, gallery_id INT NOT NULL, INDEX IDX_D23B2FE63DA5256D (image_id), INDEX IDX_D23B2FE64E7AF8F (gallery_id), PRIMARY KEY(image_id, gallery_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_slider (image_id INT NOT NULL, slider_id INT NOT NULL, INDEX IDX_60DA4ECF3DA5256D (image_id), INDEX IDX_60DA4ECF2CCC9638 (slider_id), PRIMARY KEY(image_id, slider_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, iso VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slider (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ext_translations (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(8) NOT NULL, object_class VARCHAR(255) NOT NULL, field VARCHAR(32) NOT NULL, foreign_key VARCHAR(64) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX translations_lookup_idx (locale, object_class, foreign_key), UNIQUE INDEX lookup_unique_idx (locale, object_class, field, foreign_key), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB ROW_FORMAT = DYNAMIC');
        $this->addSql('ALTER TABLE image_gallery ADD CONSTRAINT FK_D23B2FE63DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_gallery ADD CONSTRAINT FK_D23B2FE64E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_slider ADD CONSTRAINT FK_60DA4ECF3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_slider ADD CONSTRAINT FK_60DA4ECF2CCC9638 FOREIGN KEY (slider_id) REFERENCES slider (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image_gallery DROP FOREIGN KEY FK_D23B2FE64E7AF8F');
        $this->addSql('ALTER TABLE image_gallery DROP FOREIGN KEY FK_D23B2FE63DA5256D');
        $this->addSql('ALTER TABLE image_slider DROP FOREIGN KEY FK_60DA4ECF3DA5256D');
        $this->addSql('ALTER TABLE image_slider DROP FOREIGN KEY FK_60DA4ECF2CCC9638');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_gallery');
        $this->addSql('DROP TABLE image_slider');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE slider');
        $this->addSql('DROP TABLE ext_translations');
    }
}
