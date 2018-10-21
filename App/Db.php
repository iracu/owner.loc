<?php

namespace App;


class Db
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO( 'mysql:host=127.0.0.1;dbname=fw_owner', 'root', 'open' );
    }

    public function ow_execute( $sql )
    {
        $sth = $this->dbh->prepare( $sql );
        $res = $sth->execute();
        return $res;
    }

    public function ow_query( $sql, $class )
    {
        $sth = $this->dbh->prepare( $sql );
        $res = $sth->execute();
        if ( false !== $res ) {
            return $sth->fetchAll( \PDO::FETCH_CLASS, $class );
        }
        return [];
    }
}