<?php
/*
 * webStorich
 * An ultra-light web page manager for HTML courses 
 *
 * https://github.com/Axolito/webStorich/
 *
 * (c) 2020 Axolito - https://github.com/Axolito
 *
 * license GNU AGPL v3.0
 * [en] https://www.gnu.org/licenses/agpl-3.0.html
 * [fr] https://www.gnu.org/licenses/agpl-3.0.en.html
 */

	session_start();
/**
 * note par RemRem 2020-02-18 01:07
 *  - j'ai ajouté un sous dossier (lire le code) pour éviter que tu n'écrases par erreur un des scripts que tu as en place
 *  - il y a une erreur sur la façon de tester les erreurs sur l'envoie de fichier
 */
	// récupére le chemin du dossier actuel (celui de ce script)
	$path = dirname(__FILE__).'/';

	// on vérifie que le dossier existe
	$systeme_de_dossier_a_prevoir = $_SESSION["user"].'/';
	var_dump($systeme_de_dossier_a_prevoir);
	if (!is_dir($path.$systeme_de_dossier_a_prevoir)) {
		// le dossier n'existe pas, à voir si tu veux le créer
		var_dump('Le dossier '.$systeme_de_dossier_a_prevoir.' n\'existe pas');
		// si tu veux créer le dossier, quelque chose comme ça devrait le faire
		/*
		if (!mkdir($path.$systeme_de_dossier_a_prevoir)) {
			var_dump('Impossible de créer le dossier '.$systeme_de_dossier_a_prevoir;)
		}
		*/
	}

	var_dump($_FILES);
	if(isset($_FILES['upfile'])){
		// note de RemRem : tu crées un tableau $errors vide
		$errors= array();
		$file_name = $_FILES['upfile']['name'];
		$file_size = $_FILES['upfile']['size'];
		$file_tmp = $_FILES['upfile']['tmp_name'];
		$file_type = $_FILES['upfile']['type'];

		if($file_size > 2097152) {
			$errors[]='File size must be excately 2 MB';
		}

		// note de RemRem : tu testes le tableau $errors vide du coup, il ne peux pas y avoir d'erreur
                //                  regarde plutot du côté de $_FILES['upfile']['error']
		//                  cf. le var_dump($_FILES); au dessus
		if(empty($errors)==true) {
			if (move_uploaded_file($file_tmp, $path.$systeme_de_dossier_a_prevoir.$file_name)) {
				echo "Success";
			} else {
				echo 'Erreur';
			}
		}
		else{
			print_r($errors);
		}
	}
	// header() renvoit sur une autre page
    header('Location: singed.php');
?>