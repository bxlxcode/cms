<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181206125505 extends AbstractMigration
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
        $this->addSql('CREATE TABLE site_home (site_id INT NOT NULL, home_id INT NOT NULL, INDEX IDX_4A4CB129F6BD1646 (site_id), INDEX IDX_4A4CB12928CDC89C (home_id), PRIMARY KEY(site_id, home_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_language (site_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_D896CE6FF6BD1646 (site_id), INDEX IDX_D896CE6F82F1BAF4 (language_id), PRIMARY KEY(site_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slider (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image_gallery ADD CONSTRAINT FK_D23B2FE63DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_gallery ADD CONSTRAINT FK_D23B2FE64E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_slider ADD CONSTRAINT FK_60DA4ECF3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_slider ADD CONSTRAINT FK_60DA4ECF2CCC9638 FOREIGN KEY (slider_id) REFERENCES slider (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_home ADD CONSTRAINT FK_4A4CB129F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_home ADD CONSTRAINT FK_4A4CB12928CDC89C FOREIGN KEY (home_id) REFERENCES home (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_language ADD CONSTRAINT FK_D896CE6FF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_language ADD CONSTRAINT FK_D896CE6F82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image_gallery DROP FOREIGN KEY FK_D23B2FE64E7AF8F');
        $this->addSql('ALTER TABLE image_gallery DROP FOREIGN KEY FK_D23B2FE63DA5256D');
        $this->addSql('ALTER TABLE image_slider DROP FOREIGN KEY FK_60DA4ECF3DA5256D');
        $this->addSql('ALTER TABLE site_language DROP FOREIGN KEY FK_D896CE6F82F1BAF4');
        $this->addSql('ALTER TABLE image_slider DROP FOREIGN KEY FK_60DA4ECF2CCC9638');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_gallery');
        $this->addSql('DROP TABLE image_slider');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE site_home');
        $this->addSql('DROP TABLE site_language');
        $this->addSql('DROP TABLE slider');
    }
}
