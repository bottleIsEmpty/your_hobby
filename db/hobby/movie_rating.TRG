TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`%` TRIGGER rating_changing AFTER INSERT ON movie_rating FOR EACH ROW BEGIN\n	IF NEW.rating IS NOT NULL THEN \n		UPDATE movies SET movies.rated_by=movies.rated_by+1 AND movies.rating = ((movies.rated_by-1)*movies.rating + NEW.rating)/movies.rated_by;\n	END IF;\nEND'
sql_modes=1436549152
definers='root@%'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='utf8_general_ci'
created=149781815544
