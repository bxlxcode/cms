<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211085013 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE division (id INT AUTO_INCREMENT NOT NULL, director_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_10174714899FB366 (director_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE office (id INT AUTO_INCREMENT NOT NULL, manager_id INT DEFAULT NULL, division_id INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, is_publish TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_74516B02783E3463 (manager_id), INDEX IDX_74516B0241859289 (division_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, image INT NOT NULL, full_name VARCHAR(255) NOT NULL, job_title VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, is_publish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE division ADD CONSTRAINT FK_10174714899FB366 FOREIGN KEY (director_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE office ADD CONSTRAINT FK_74516B02783E3463 FOREIGN KEY (manager_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE office ADD CONSTRAINT FK_74516B0241859289 FOREIGN KEY (division_id) REFERENCES division (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE office DROP FOREIGN KEY FK_74516B0241859289');
        $this->addSql('ALTER TABLE division DROP FOREIGN KEY FK_10174714899FB366');
        $this->addSql('ALTER TABLE office DROP FOREIGN KEY FK_74516B02783E3463');
        $this->addSql('DROP TABLE division');
        $this->addSql('DROP TABLE office');
        $this->addSql('DROP TABLE team');
    }
}
