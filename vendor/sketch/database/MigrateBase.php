<?php

namespace sketch\database;

use sketch\CommandInterface;

abstract class MigrateBase implements CommandInterface
{
    public $db;
    public function up(){}
    public function down(){}

    private function checkMigrationTable()
    {
        return $this->db->tableIsExist('migration');
    }

    private function createMigrationTable()
    {
        $this->db->createTable('migration', [
            'version' => 'character varying(180) NOT NULL',
            'apply_time' => 'integer',
            ],
            [
                'CONSTRAINT migration_pkey PRIMARY KEY (version)',

            ]
        );
    }

    public function getMigrationListAll(){
        $MigrationsNameSpase =  get_class($this)."_files";
        $path = ROOT.'\\'.$MigrationsNameSpase."\\*.php";
        $List = [];
        foreach (glob($path) as $File) {
            $List[] = $MigrationsNameSpase.'\\'.basename($File, ".php");
        }
        return $List;
    }

    public function getMigrationListNew(){
        $MigrationsNameSpase =  get_class($this)."_files";
        $path = ROOT.'\\'.$MigrationsNameSpase."\\*.php";
        $List = [];
        foreach (glob($path) as $File) {
            $className = basename($File, ".php");
            if (! $this->db->recordIsExist('migration', "version='{$className}'")){
                $List[] = $MigrationsNameSpase.'\\'.basename($File, ".php");
            };
        }
        return $List;
    }

    public function upOne($className){
        $CurrentMigrate = new $className;
        $CurrentMigrate->up();
        $time = time();
        $MigrateName = join('', array_slice(explode('\\', $className), -1));
        $this->db->query(
            "INSERT INTO migration (version, apply_time) 
             VALUES ('{$MigrateName}', {$time})"
        );
    }

    public function run($params=[])
    {

        if ($this->checkMigrationTable()){
            $List = $this->getMigrationListNew();
        } else {
            $this->createMigrationTable();
            $List = $this->getMigrationListAll();
        };

        foreach ($List as $className) {
            $this->upOne($className);
        }
    }
}
