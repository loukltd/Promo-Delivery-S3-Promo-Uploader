<?php
session_start();

$artist = $_POST['artist'];
$title = $_POST['title'];
$label = $_POST['label'];
$catno = $_POST['catno'];
$tracks = $_POST['tracks'];
$genre = $_POST['genre'];
$description = $_POST['description'];
$send_date = $_POST['promo-send-date'];

$artworkFilename = $_FILES['artwork-file-input']['name'];
$artworkTempPath = $_FILES['artwork-file-input']['tmp_name'];

$artworkExtension = strtolower(pathinfo($artworkFilename, PATHINFO_EXTENSION));
$artworkNewName = preg_replace('/[^A-Za-z0-9\-]/', '', "$artist-$title-$label") . '.jpg';
$artworkNewPath = 'uploads/' . $artworkNewName;

// Copy the original artwork image to the uploads directory
move_uploaded_file($artworkTempPath, $artworkNewPath);

// Resize and save 600x600 version
$artwork = imagecreatefromjpeg($artworkNewPath);
$artworkResized = imagescale($artwork, 600, 600);
imagejpeg($artworkResized, $artworkNewPath, 100);

// Resize and save 100x100 version
$artworkThumbnail = imagescale($artwork, 100, 100);
$artworkThumbnailNewName = preg_replace('/[^A-Za-z0-9\-]/', '', "$artist-$title-$label-px") . '.jpg';
$artworkThumbnailNewPath = 'uploads/' . $artworkThumbnailNewName;
imagejpeg($artworkThumbnail, $artworkThumbnailNewPath, 100);

// Destroy image resources
imagedestroy($artwork);
imagedestroy($artworkResized);
imagedestroy($artworkThumbnail);

$_SESSION['artist'] = $artist;
$_SESSION['title'] = $title;
$_SESSION['label'] = $label;
$_SESSION['catno'] = $catno;
$_SESSION['tracks'] = $tracks;
$_SESSION['genre'] = $genre;
$_SESSION['description'] = $description;
$_SESSION['promo-send-date'] = $send_date;
$_SESSION['artwork'] = $artworkNewPath;
$_SESSION['artwork-thumbnail'] = $artworkThumbnailNewPath;

header('Location: Submit.php');
?>
