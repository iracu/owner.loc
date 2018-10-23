<?php

namespace App;


class Db
{
//    /**
//     * @var Db
//     */
//    private static $instance;
//
//    /**
//     * @var \PDO
//     */
//    public $dbh;
//
//    /**
//     * @return Db
//     */
//    public static function getInstance()
//    {
//        if ( static::$instance === null )
//        {
//            static::$instance = new static();
//        }
//
//        return static::$instance;
//    }

    use Singleton;
    /**
     * Db constructor.
     */
    protected function __construct()
    {
        $this->dbh = new \PDO( 'mysql:host=127.0.0.1;dbname=fw_owner', 'root', 'open' );
    }

    /**
     * @param $sql
     * @return bool
     */
    public function owExecute( $sql, $params = [] )
    {
        $sth = $this->dbh->prepare( $sql );
        $res = $sth->execute( $params );
        return $res;
    }

    /**
     * @param $sql
     * @param $class
     * @return array
     */
    public function owQuery( $sql, $class )
    {
        $sth = $this->dbh->prepare( $sql );
        $res = $sth->execute();
        if ( false !== $res ) {
            return $sth->fetchAll( \PDO::FETCH_CLASS, $class );
        }
        return [];
    }

    /**
     * @param $table
     * @param $id
     * @return array|mixed
     */
    public function owQueryById( $table, $id )
    {
        $sth = $this->dbh->prepare( 'SELECT * FROM `' . $table . '` WHERE id=?');
        $res = $sth->execute([$id]);

        if ( false !== $res ) {
            return $sth->fetch(\PDO::FETCH_ASSOC);
        }

        return [];
    }


    public function owLastArticle( $sql, $class )
    {
        $sth = $this->dbh->prepare( $sql );
        $res = $sth->execute();
        if ( false !== $res ) {
            return $sth->fetchAll( \PDO::FETCH_CLASS, $class );
        }
        return [];
    }

}