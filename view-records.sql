SELECT record_id AS "Record ID", title AS "Record Title", Artist.name AS "Artist Name", format(price, 2) AS "Price", owner AS "Owner ID", last_cleaned AS "Date Last Cleaned"
FROM Record join Artist
WHERE Artist.artist_id = Record.artist
ORDER BY title;