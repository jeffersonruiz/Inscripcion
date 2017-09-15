<?php

namespace common\models;

use yii;

class AccessHelpers {

    public static function getAcceso($operacion)
    {
        if (Yii::$app->user->identity){
            $connection = \Yii::$app->db;
            $sql = "SELECT CONCAT_WS('-',m.nombre, o.nombre) AS nombre
                    FROM ((((user u
                    JOIN rol r ON u.rol_id = r.id)
                    JOIN rol_operacion ro ON r.id = ro.rol_id)
                    JOIN operacion o ON ro.operacion_id = o.id)
                    JOIN menu m ON o.menu_id = m.id)
                    WHERE CONCAT_WS('-',m.nombre, o.nombre) =:operacion
                    AND u.rol_id =:rol_id";
            $command = $connection->createCommand($sql);
            $command->bindValue(":operacion", $operacion);
            $command->bindValue(":rol_id", Yii::$app->user->identity->rol_id);
            $result = $command->queryOne();
           
            //die($operacion);

            if ($result['nombre'] != null){
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

}

