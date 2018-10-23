<?php
namespace App;


abstract class Model
{
    const TABLE = '';

    public $id;

    /**
     * @return array
     */
    public static function owFindAll()
    {
        return Db::instance()->owQuery(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public static function owFindById( int $id )
    {
        return Db::instance()->owQueryById(static::TABLE, $id);
    }

    /**
     * @param $limit
     * @return array
     */
    public static function  owRecentArticle( int $limit )
    {
        return Db::instance()->owQuery(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $limit,
            static::class
        );
    }

    public function isNew()
    {
        return empty( $this->id );
    }

    public function owInsert()
    {
        if ( $this->isNew() )
        {
            return;
        }

        $columns = [];
        $values = [];
        foreach ( $this as $key => $value )
        {
            if ( 'id'  == $key )
            {
                continue;
            }
            $columns[] = $key;
            $values[':' . $key ] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            '(' . implode( ',', $columns ) . ')
            VALUES 
            (' . implode( ',', array_keys( $values ) ) . ')';
        $db = Db::instance();
        $db->owExecute( $sql, $values );

    }
}