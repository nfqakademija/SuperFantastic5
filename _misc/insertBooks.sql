INSERT books (owner_id, description_id, added_at)
SELECT 1 as owner_id, id, Date('2015-05-08') as added_at  
FROM descriptions
WHERE id > 4;