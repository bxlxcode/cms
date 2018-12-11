<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211080151 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE intrdocution_landing_page (id INT AUTO_INCREMENT NOT NULL, landing_page_id INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_A5FC6D94DF122DC5 (landing_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, description VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) NOT NULL, copyright VARCHAR(255) DEFAULT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_gallery (image_id INT NOT NULL, gallery_id INT NOT NULL, INDEX IDX_D23B2FE63DA5256D (image_id), INDEX IDX_D23B2FE64E7AF8F (gallery_id), PRIMARY KEY(image_id, gallery_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_slider (image_id INT NOT NULL, slider_id INT NOT NULL, INDEX IDX_60DA4ECF3DA5256D (image_id), INDEX IDX_60DA4ECF2CCC9638 (slider_id), PRIMARY KEY(image_id, slider_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE landing (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE landign_page (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE landign_page_landing (landign_page_id INT NOT NULL, landing_id INT NOT NULL, INDEX IDX_8BB4F4A58FA4B054 (landign_page_id), INDEX IDX_8BB4F4A5EFD98736 (landing_id), PRIMARY KEY(landign_page_id, landing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE landign_page_language (landign_page_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_1FDE4C038FA4B054 (landign_page_id), INDEX IDX_1FDE4C0382F1BAF4 (language_id), PRIMARY KEY(landign_page_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, iso VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_landing_page (id INT AUTO_INCREMENT NOT NULL, landing_page_id INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_BC82C1DBDF122DC5 (landing_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_home (site_id INT NOT NULL, home_id INT NOT NULL, INDEX IDX_4A4CB129F6BD1646 (site_id), INDEX IDX_4A4CB12928CDC89C (home_id), PRIMARY KEY(site_id, home_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_language (site_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_D896CE6FF6BD1646 (site_id), INDEX IDX_D896CE6F82F1BAF4 (language_id), PRIMARY KEY(site_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slider (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header_landing_page (id INT AUTO_INCREMENT NOT NULL, landing_page_id INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_A17DA1EDF122DC5 (landing_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_3F207042C2AC5D3 (translatable_id), UNIQUE INDEX category_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header_landing_page_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, call_to_action VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_B25169432C2AC5D3 (translatable_id), UNIQUE INDEX header_landing_page_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intrdocution_landing_page_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, body VARCHAR(255) NOT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_BA0E3E792C2AC5D3 (translatable_id), UNIQUE INDEX intrdocution_landing_page_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE landign_page_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_6F387B372C2AC5D3 (translatable_id), UNIQUE INDEX landign_page_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_landing_page_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, body VARCHAR(255) DEFAULT NULL, call_to_action VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_EB7D7F762C2AC5D3 (translatable_id), UNIQUE INDEX offre_landing_page_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_5F477ADF2C2AC5D3 (translatable_id), UNIQUE INDEX site_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ext_translations (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(8) NOT NULL, object_class VARCHAR(255) NOT NULL, field VARCHAR(32) NOT NULL, foreign_key VARCHAR(64) NOT NULL, content LONGTEXT DEFAULT NULL, INDEX translations_lookup_idx (locale, object_class, foreign_key), UNIQUE INDEX lookup_unique_idx (locale, object_class, field, foreign_key), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB ROW_FORMAT = DYNAMIC');
        $this->addSql('ALTER TABLE intrdocution_landing_page ADD CONSTRAINT FK_A5FC6D94DF122DC5 FOREIGN KEY (landing_page_id) REFERENCES landign_page (id)');
        $this->addSql('ALTER TABLE image_gallery ADD CONSTRAINT FK_D23B2FE63DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_gallery ADD CONSTRAINT FK_D23B2FE64E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_slider ADD CONSTRAINT FK_60DA4ECF3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_slider ADD CONSTRAINT FK_60DA4ECF2CCC9638 FOREIGN KEY (slider_id) REFERENCES slider (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE landign_page_landing ADD CONSTRAINT FK_8BB4F4A58FA4B054 FOREIGN KEY (landign_page_id) REFERENCES landign_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE landign_page_landing ADD CONSTRAINT FK_8BB4F4A5EFD98736 FOREIGN KEY (landing_id) REFERENCES landing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE landign_page_language ADD CONSTRAINT FK_1FDE4C038FA4B054 FOREIGN KEY (landign_page_id) REFERENCES landign_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE landign_page_language ADD CONSTRAINT FK_1FDE4C0382F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_landing_page ADD CONSTRAINT FK_BC82C1DBDF122DC5 FOREIGN KEY (landing_page_id) REFERENCES landign_page (id)');
        $this->addSql('ALTER TABLE site_home ADD CONSTRAINT FK_4A4CB129F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_home ADD CONSTRAINT FK_4A4CB12928CDC89C FOREIGN KEY (home_id) REFERENCES home (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_language ADD CONSTRAINT FK_D896CE6FF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_language ADD CONSTRAINT FK_D896CE6F82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE header_landing_page ADD CONSTRAINT FK_A17DA1EDF122DC5 FOREIGN KEY (landing_page_id) REFERENCES landign_page (id)');
        $this->addSql('ALTER TABLE category_translation ADD CONSTRAINT FK_3F207042C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE header_landing_page_translation ADD CONSTRAINT FK_B25169432C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES header_landing_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intrdocution_landing_page_translation ADD CONSTRAINT FK_BA0E3E792C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES intrdocution_landing_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE landign_page_translation ADD CONSTRAINT FK_6F387B372C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES landign_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_landing_page_translation ADD CONSTRAINT FK_EB7D7F762C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES offre_landing_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_translation ADD CONSTRAINT FK_5F477ADF2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES site (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE intrdocution_landing_page_translation DROP FOREIGN KEY FK_BA0E3E792C2AC5D3');
        $this->addSql('ALTER TABLE image_gallery DROP FOREIGN KEY FK_D23B2FE64E7AF8F');
        $this->addSql('ALTER TABLE site_home DROP FOREIGN KEY FK_4A4CB12928CDC89C');
        $this->addSql('ALTER TABLE image_gallery DROP FOREIGN KEY FK_D23B2FE63DA5256D');
        $this->addSql('ALTER TABLE image_slider DROP FOREIGN KEY FK_60DA4ECF3DA5256D');
        $this->addSql('ALTER TABLE landign_page_landing DROP FOREIGN KEY FK_8BB4F4A5EFD98736');
        $this->addSql('ALTER TABLE intrdocution_landing_page DROP FOREIGN KEY FK_A5FC6D94DF122DC5');
        $this->addSql('ALTER TABLE landign_page_landing DROP FOREIGN KEY FK_8BB4F4A58FA4B054');
        $this->addSql('ALTER TABLE landign_page_language DROP FOREIGN KEY FK_1FDE4C038FA4B054');
        $this->addSql('ALTER TABLE offre_landing_page DROP FOREIGN KEY FK_BC82C1DBDF122DC5');
        $this->addSql('ALTER TABLE header_landing_page DROP FOREIGN KEY FK_A17DA1EDF122DC5');
        $this->addSql('ALTER TABLE landign_page_translation DROP FOREIGN KEY FK_6F387B372C2AC5D3');
        $this->addSql('ALTER TABLE landign_page_language DROP FOREIGN KEY FK_1FDE4C0382F1BAF4');
        $this->addSql('ALTER TABLE site_language DROP FOREIGN KEY FK_D896CE6F82F1BAF4');
        $this->addSql('ALTER TABLE offre_landing_page_translation DROP FOREIGN KEY FK_EB7D7F762C2AC5D3');
        $this->addSql('ALTER TABLE site_home DROP FOREIGN KEY FK_4A4CB129F6BD1646');
        $this->addSql('ALTER TABLE site_language DROP FOREIGN KEY FK_D896CE6FF6BD1646');
        $this->addSql('ALTER TABLE site_translation DROP FOREIGN KEY FK_5F477ADF2C2AC5D3');
        $this->addSql('ALTER TABLE image_slider DROP FOREIGN KEY FK_60DA4ECF2CCC9638');
        $this->addSql('ALTER TABLE header_landing_page_translation DROP FOREIGN KEY FK_B25169432C2AC5D3');
        $this->addSql('ALTER TABLE category_translation DROP FOREIGN KEY FK_3F207042C2AC5D3');
        $this->addSql('DROP TABLE intrdocution_landing_page');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE home');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_gallery');
        $this->addSql('DROP TABLE image_slider');
        $this->addSql('DROP TABLE landing');
        $this->addSql('DROP TABLE landign_page');
        $this->addSql('DROP TABLE landign_page_landing');
        $this->addSql('DROP TABLE landign_page_language');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE offre_landing_page');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE site_home');
        $this->addSql('DROP TABLE site_language');
        $this->addSql('DROP TABLE slider');
        $this->addSql('DROP TABLE header_landing_page');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_translation');
        $this->addSql('DROP TABLE header_landing_page_translation');
        $this->addSql('DROP TABLE intrdocution_landing_page_translation');
        $this->addSql('DROP TABLE landign_page_translation');
        $this->addSql('DROP TABLE offre_landing_page_translation');
        $this->addSql('DROP TABLE site_translation');
        $this->addSql('DROP TABLE ext_translations');
    }
}
