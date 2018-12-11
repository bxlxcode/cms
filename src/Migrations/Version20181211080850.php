<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211080850 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE header_landing_page ADD is_publish TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE intrdocution_landing_page ADD is_publish TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE landign_page ADD is_publish TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE offre_landing_page ADD is_publish TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE site ADD is_publish TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE header_landing_page DROP is_publish');
        $this->addSql('ALTER TABLE intrdocution_landing_page DROP is_publish');
        $this->addSql('ALTER TABLE landign_page DROP is_publish');
        $this->addSql('ALTER TABLE offre_landing_page DROP is_publish');
        $this->addSql('ALTER TABLE site DROP is_publish');
    }
}
