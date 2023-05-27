<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=registration", 'root', '');

    /*
        HELP HELP HELP HELP HELP HELP HELP HELP HELP HELP
    */

    $query = '
    START TRANSACTION;

INSERT INTO author_table (author_name)
SELECT * FROM (SELECT :book_author) AS tmp
WHERE NOT EXISTS (
    SELECT author_name FROM author_table WHERE author_name = :book_author
) LIMIT 1;

SET @author_id =
    COALESCE((SELECT id FROM author_table WHERE author_name = :book_author), LAST_INSERT_ID());

INSERT INTO releaseyear_table (releaseyear)
SELECT * FROM (SELECT :book_release_year) AS tmp
WHERE NOT EXISTS (
    SELECT releaseyear FROM releaseyear_table WHERE releaseyear = :book_release_year
) LIMIT 1;

SET @releaseyear_id =
    COALESCE((SELECT id FROM releaseyear_table WHERE releaseyear = :book_release_year), LAST_INSERT_ID());

  INSERT INTO books (book_title, book_description, book_cover, book_file)
  VALUES (:book_title, :book_description, :book_cover, :book_file);
  
  SET @book_id = LAST_INSERT_ID();
  
  INSERT INTO genres_table (genre_name)
  SELECT * FROM (SELECT :book_genres) AS tmp
  WHERE NOT EXISTS (
    SELECT genre_name FROM genres_table WHERE genre_name = :book_genres
  ) LIMIT 1;
  
  SET @genre_id =
    COALESCE((SELECT id FROM genres_table WHERE genre_name = :book_genres), LAST_INSERT_ID());

  INSERT INTO book_author_relations (book_id, book_author)
  VALUES (@book_id, @author_id);

  INSERT INTO book_genre_relations (book_id, book_genres)
  VALUES (@book_id, @genre_id);

  INSERT INTO book_releaseyear_relations (book_id, book_releaseyear)
  VALUES (@book_id, @releaseyear_id);

COMMIT;
    ';

    $upload = $conn->prepare($query);

    $upload->execute([
        'book_title' => $_POST['book_title'],
        'book_author' => $_POST['book_author'],
        'book_release_year' => $_POST['book_release_year'],
        'book_genres' => $_POST['book_genres'],
        'book_description' => $_POST['book_description'],
        'book_cover' => $_POST['book_cover'],
        'book_file' => $_POST['book_file'],
        'book_link' => $_POST['book_link']
    ]);

    header("Location: ./Library.php");
} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}
