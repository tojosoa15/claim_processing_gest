<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250508184400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE draft_vehicle_informations DROP CONSTRAINT DF_23F38554_4C3CE4ED
        // SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE draft_vehicle_informations ALTER COLUMN is_the_vehicle_total_loss BIT NOT NULL
        SQL);
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE user_roles DROP COLUMN assigned_at
        // SQL);
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE user_roles DROP COLUMN is_active
        // SQL);
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE vehicle_informations DROP CONSTRAINT DF_D67E8BFD_4C3CE4ED
        // SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicle_informations ALTER COLUMN is_the_vehicle_total_loss BIT NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_accessadmin
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_backupoperator
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_datareader
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_datawriter
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_ddladmin
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_denydatareader
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_denydatawriter
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_owner
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA db_securityadmin
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SCHEMA dbo
        SQL);
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE user_roles ADD assigned_at DATETIME2(6) CONSTRAINT DF_54FCD59F_343E8069 DEFAULT CURRENT_TIMESTAMP
        // SQL);
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE user_roles ADD is_active BIT CONSTRAINT DF_54FCD59F_1B5771DD DEFAULT 1
        // SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicle_informations ALTER COLUMN is_the_vehicle_total_loss BIT NOT NULL
        SQL);
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE vehicle_informations ADD CONSTRAINT DF_D67E8BFD_4C3CE4ED DEFAULT 0 FOR is_the_vehicle_total_loss
        // SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE draft_vehicle_informations ALTER COLUMN is_the_vehicle_total_loss BIT NOT NULL
        SQL);
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE draft_vehicle_informations ADD CONSTRAINT DF_23F38554_4C3CE4ED DEFAULT 0 FOR is_the_vehicle_total_loss
        // SQL);
    }
}
