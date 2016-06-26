<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'lapalapa');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'dayana');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '*&AaXHy6-tr<)Hm].0]](19hxku3C.o7=~=!MN$!{;Kn+eh9av~;@n0i{&wW30+T');
define('SECURE_AUTH_KEY', 'Lh3LXo7tg0/xv~Y@l~rLeA`Y!ftc!b1.Z^h?_mQ32!9B!O_-Y6P9IB|Nls!G|~)7');
define('LOGGED_IN_KEY', '=Q.?8l9t OsO%IQ]s`<- ~7K`jq2MkLsh(LkhG|Q,+!_uJ.KPU&fbaiP;=RW1$kt');
define('NONCE_KEY', '{i]d7)xC9[<TA|D,;6LZF_;?F$;WX0^uKQG(k*`Q(<n{ZDxq:Vy4U,?.b2YH%>Qi');
define('AUTH_SALT', '}Zo3VZzO[l9:uArd6LGD;dbz1IcoL?9M}:7% w/91a?kr`ihw[mm{q8$?~A%9n`|');
define('SECURE_AUTH_SALT', '.v213Q*i j D&k8%/Aj!W@]:=t{PNO3;19zjXx^ifBShQrn)eQ^,FS9P.;d6:7vx');
define('LOGGED_IN_SALT', 'xiX]RUv ?a=Hcji(9`$y63U`3!j7%dSs<a5{zVxjkP;R!kn?FGI-AhH#[A1g{XMM');
define('NONCE_SALT', 'eWEW9UE88ra&mTs[zkAr&A?D{HIkG[<I/~5B-[s}cg14lQ2nU`rA|KC g;I&6`IE');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

