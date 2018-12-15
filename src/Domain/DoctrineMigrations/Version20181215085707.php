<?php declare(strict_types=1);

namespace App\Domain\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181215085707 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE upe2a_control (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE upe2a_control_thumbnail (control_id INT NOT NULL, thumbnail_id INT NOT NULL, INDEX IDX_788EA14332BEC70E (control_id), INDEX IDX_788EA143FDFF2E92 (thumbnail_id), PRIMARY KEY(control_id, thumbnail_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE upe2a_thumbnail (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, extension VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE upe2a_control_thumbnail ADD CONSTRAINT FK_788EA14332BEC70E FOREIGN KEY (control_id) REFERENCES upe2a_control (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE upe2a_control_thumbnail ADD CONSTRAINT FK_788EA143FDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES upe2a_thumbnail (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE upe2a_control_thumbnail DROP FOREIGN KEY FK_788EA14332BEC70E');
        $this->addSql('ALTER TABLE upe2a_control_thumbnail DROP FOREIGN KEY FK_788EA143FDFF2E92');
        $this->addSql('DROP TABLE upe2a_control');
        $this->addSql('DROP TABLE upe2a_control_thumbnail');
        $this->addSql('DROP TABLE upe2a_thumbnail');
    }
}
