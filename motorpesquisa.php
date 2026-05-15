$sql = "SELECT m.MAT_NOME, COUNT(p.ID) as presencas 
        FROM TAB_MATRICULA m 
        LEFT JOIN TAB_PRESENCA p ON m.MAT_ID = p.PRE_PRONT 
        GROUP BY m.MAT_ID";